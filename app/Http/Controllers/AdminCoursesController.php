<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CustomClasses\vimeo_tools;
use App\Category;
use App\Course;
use App\User;
use App\UserGroup;
use App\CourseUser;
use App\CourseItem;
use App\CourseItemType;
use App\CourseItemGroup;
use App\CourseItemOption;
use Storage;
use Session;
use Auth;
use Log;


class AdminCoursesController extends Controller
{	    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function analise()
    {
        return view('admin.courses.analise')
        ->with('courses', Course::all())
        ->with('categories', Category::all())
        ->with('users', User::all());
    }

    public function aprove($id)
    {
        $course = Course::find($id);
        $course->avaliable = 1;
        $course->save();
        return redirect()->back()->with('success', 'Curso aprovado e disponível.');
    }


    public function remove($id)
    {
        $course = Course::find($id);
        $course->avaliable = 2;
        $course->save();
        return redirect()->back()->with('success', 'Curso reprovado.');
        
    }
    public function index()
    {
        return view('admin.courses.index')
        ->with('courses', Course::all())
        ->with('categories', Category::all())
        ->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.courses.create')
        ->with('categories', Category::all())
        ->with('user_groups', UserGroup::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //valida os campos digitados
        $this->validate($request, [
            'name'        => 'required|max:100',
            'desc'        => 'required',
            'price'       => 'required',
            'featured'    => 'required',
            'category_id' => 'required'
        ]);
        //Chama o objeto
        $course = new Course();
        //Vincula as variaveis 
        $course->name               = $request->name;
        $course->desc               = $request->desc;
        $course->price              = $request->price;
        $course->category_id        = $request->category_id;
        $course->subcategory_id     = $request->subcategory_id;
        $course->featured           = $request->featured;
        $course->requirements       = $request->requirements;
        $course->interest           = $request->interest;
        $course->user_id_owner      = Auth::user()->id;
        $course->total_class        = 0;
//Verficacao de URL amigável
        $urn = '';
        $urns = explode(' ', $request->name);
        for($i = 0; $i < sizeof($urns); $i++) {
            $urn =  $urn . '-' .$urns[$i];
            
        }
        $urns = 1;
        while ($urns != 0) {
            $urns = Course::where('urn', $urn)->count();
            $urn = $urn.'-'.$urns;
        }
        $course->urn        = $urn; 

        //valida a foto de perfil
        if($request->thumb_img != '')
        {
            $attach_thumb_img       = $request->thumb_img;
            $attach_thumb_img_name  = time().$attach_thumb_img->getClientOriginalName();
            $attach_thumb_img->move('images/aulas', $attach_thumb_img_name); 

            $course->thumb_img      = $attach_thumb_img_name;  
        }
        else
            $course->thumb_img      = 'e-learning.jpg';

        //Valida o video     
        if($request->video != '')
        {
            $attach_video           = $request->video;
            $count = 1;
            while($count != 0){
                $str            = "";
                $characters     = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max            = count($characters) - 1;

                for ($i = 0; $i < 7; $i++) {
                    $rand   = mt_rand(0, $max);
                    $str   .= $characters[$rand];
                    $count  = Course::where('video', $str)->count();
                }
            }
            $attach_video_name = $str;
            $attach_video->move('images/aulas', $attach_video_name); 
            $course->video = $attach_video_name;  
        }

        $course->save();
        $id = $course->id;
        // se tiver algum check nos grupos de usuário
        if($request->group != '')
        {
            foreach($request->group as $checked) 
            {
                $userGroup      = UserGroup::find($checked);
                // vincula curso com o usergroup em questao
                $course->userGroups()->attach($userGroup);
                // remover essa linha e a coluna da tabela de grupos
                $course->group  = 'ta dentro';
                $course->save();
            }
        }
        Session::flash('success', 'Curso criado com sucesso');

        $course             = Course::find($id);
        $categories         = Category::all();
        $course_items_group = CourseItemGroup::all();
        $user_groups        = UserGroup::all();

        return redirect()->route('course.edit', 
            ['id'                   => $id,
            'course'                => $course,
            'categories'            => $categories,
            'course_items_group'    => $course_items_group,
            'user_groups'           => $user_groups]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        return view('admin.courses.edit')
        ->with('course', $course)
        ->with('categories', Category::all())
        ->with('course_items_group', CourseItemGroup::all())
        ->with('user_groups', UserGroup::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $this->validate($request, [
            'name'        => 'required|max:100',
            'desc'        => 'required',
            'price'       => 'required',
            'category_id' => 'required',
            'featured'    => 'required'
        ]);

        $course->name               = $request->name;
        $course->desc               = $request->desc;
        $course->price              = $request->price;
        $course->category_id        = $request->category_id;
        $course->subcategory_id     = $request->subcategory_id;
        $course->requirements       = $request->requirements;
        $course->featured           = $request->featured;
        $course->interest           = $request->interest;
        

        if($request->thumb_img != ''){
            $attach_thumb_img       = $request->thumb_img;
            $attach_thumb_img_name  = time().$attach_thumb_img->getClientOriginalName();
            $attach_thumb_img->move('images/aulas', $attach_thumb_img_name); 

            $course->thumb_img      = $attach_thumb_img_name;  
        }
        else
            $course->thumb_img      = 'e-learning.jpg';

        if($request->video != ''){
            $attach_video           = $request->video;
            $count = 1;
            while($count != 0){
                $str = "";
                $characters         = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max                = count($characters) - 1;
                for ($i = 0; $i < 7; $i++) {
                    $rand       = mt_rand(0, $max);
                    $str       .= $characters[$rand];
                }
                $count              = Course::where('video', $str)->count();
                $attach_video_name  = $str;
            }
            $attach_video->move('images/aulas', $attach_video_name); 

            $course->video = $attach_video_name;    
        }
        //busca TODOS os usergroups para serem comparados com:
        // - os CHECKS 
        // - os vínculos do grupo aos userGroups
        $userGroups = UserGroup::all();
        // grupo por grupo
        foreach($userGroups as $userGroup){
            // se o curso PERTENCE ao grupo
            if($userGroup->courses->contains($course)){   
                // seta condição de remoção do grupo como verdadeira
                $remove = true;

                //verifica se existe algum CHECK no request
                if($request->group){
                    // lista cada um dos CHECKS
                    foreach($request->group as $checked){
                        // se o id do CHECK for igual ao id do GRUPO (do foreach)
                            // curso não será removido do grupo
                        if($userGroup->id == $checked)
                            $remove = false;
                    // remove curso do grupo
                        if($remove)
                            $course->userGroups()->detach($userGroup);
                // se o curso NÃO PERTENCE ao grupo
                // seta condição de adição no grupo como falsa
                        else
                            $add = false;
                    }
                }    
                //verifica se existe algum CHECK no request
                    // lista cada um dos CHECKS
                        // se o id do CHECK for igual ao id do GRUPO (do foreach)
                if($request->group){
                    foreach($request->group as $checked){
                        if($userGroup->id == $checked)
                            // curso será adicionado do grupo
                            $add = true;
                        if($add)
                    // adiciona curso ao grupo
                            $course->userGroups()->attach($userGroup);
                    }
                }

            }            
        }
        $course->save();

        Session::flash('success', 'Curso atualizado com sucesso');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        $course->delete();

        Session::flash('success', 'Curso removido com sucesso');
        return redirect()->back();
    }

    public function subCateg(Request $request)
    {
        $categ = Category::find($request->categId);

        $subCateg = Category::where('category_id_parent', $categ->id)->get();
        return json_encode($subCateg);
    }

    /**
     * Store a newly chapter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chapter(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'desc'      => 'required'
        ]);


        $order = CourseItemGroup::count();

        $course_item_group = CourseItemGroup::create([
            'name'      =>  $request->name,
            'desc'      =>  $request->desc,
            'course_id' =>  $id,
            'order'     =>  $order 
        ]);


        Session::flash('success', 'Capítulo adicionado com sucesso');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified chapter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chapter_edit($id)
    {
        $chapter = CourseItemGroup::find($id);

        return view('admin.courses.chapter')
        ->with('chapter', $chapter)
        ->with('items', CourseItem::all())
        ->with('items_type', CourseItemType::all());
    }

    /**
     * Update the specified chapter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chapter_update(Request $request, $id)
    {
        $chapter = CourseItemGroup::find($id);

        $this->validate($request, [
            'name'      => 'required',
            'desc'      => 'required'
        ]);

        $chapter->name = $request->name;
        $chapter->desc = $request->desc;
        $chapter->save();

        Session::flash('success', 'Capítulo editado com sucesso');
        return redirect()->back();
    }

    public function chapter_delete($id)
    {
        $chapter = CourseItemGroup::find($id);

        foreach ($chapter->course_items as $item)
        {
            if($item->course_item_options->count() > 0)
            {
                foreach ($item->course_item_options as $option) {
                    $option->forceDelete();
                }
            }
            $item->forceDelete();
        }

        $chapter->delete();
        Session::flash('info', 'Capítulo e itens relacionados excluidos com sucesso!');
        return redirect()->back();
    }
    /**
     * Store a newly item for the chapter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function item(Request $request, $id)
    {

        $this->validate($request, [
            'name'          => 'required'
        ]);        
        $item = new CourseItem;
        
        $item->name                     = $request->name;
        $item->desc                     = $request->desc;
        $item->course_item_group_id     = $id;
        $item->course_item_types_id     = $request->item_type_id;
        $item->course_items_parent      = NULL;
        
        if(isset($request->archive))
        {
            $attach = $request->archive;

            $count = 1;
            while($count != 0){
                $str = "";
                $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max = count($characters) - 1;
                for ($i = 0; $i < 7; $i++) {
                    $rand = mt_rand(0, $max);
                    $str .= $characters[$rand];
                }
                $path = 'uploads/archives/'.$str; 
                $count = CourseItem::where('path', $path)->count();
                $attach_new_name = $str;
            }


            $attach->move('uploads/archives', $attach_new_name); 
            $new_path = 'uploads/archives/'. $attach_new_name;
            if($request->vimeo == 1){                
                $vimeo_result = vimeo_tools::Upload_Video($new_path,$item);                
                $item->path = $vimeo_result;
            }
            else {                
                $item->path = $new_path;       
            }
        }

        $order = DB::table('course_items')
        ->whereNull('course_items_parent')
        ->count();
        
        $item->order = $order;

        $item->save();
        $total_class = CourseItem::where('course_item_group_id', $id)->count();
        
        Course::where('id', $id)->update([
            'total_class' => $total_class,
        ]);

        Session::flash('success', 'Conteúdo adicionado com sucesso.');
        return redirect()->back();
    }

    public function item_child(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'item_type_id'  => 'required',
        ]);

        $item = new CourseItem;

        $item->name                     = $request->name;
        $item->desc                     = $request->desc;
        $item->course_item_group_id     = $id;
        $item->course_item_types_id     = $request->item_type_id;
        $item->course_items_parent      = $request->id;

        if(isset($request->archive))
        {
            $attach = $request->archive;
            $attach_new_name = time().$attach->getClientOriginalName();
            $attach->move('uploads/archives', $attach_new_name); 
            $new_path = 'uploads/archives/'. $attach_new_name;
            if($request->vimeo == 1){
                $vimeo_result = $this->vimeo_upload($new_path,$item);
                $item->path = $vimeo_result;
            }
            else {                
                $item->path = $new_path;       
            }
        }

        $order = DB::table('course_items')
        ->whereNotNull('course_items_parent')
        ->count();
        
        $item->order = $order;

        $item->save();
        Session::flash('success', 'Aula/Avaliação adicionada com sucesso');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified item of the chapter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function item_edit($id)
    {
        $item = CourseItem::find($id);
        $chapter = CourseItemGroup::find($item->course_item_group_id);

        if($item->course_item_type->id >= 6)
        {
            return view('admin.courses.question')
            ->with('item', $item)
            ->with('items', CourseItem::all())
            ->with('chapter', $chapter)
            ->with('items_type', CourseItemType::all());
        }
        else
        {
            $items = CourseItem::all();
            if(strpos('vimeo',$item->path)){
                //this is a vimeo url, say so
                $item = vimeo_tools::parse_for_urls($items);
            }
            return view('admin.courses.item')
            ->with('item', $item)
            ->with('items', $items)
            ->with('chapter', $chapter)    
            ->with('items_type', CourseItemType::all());
        }        
    }

    /**
     * Update the specified item of the chapter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function item_update(Request $request, $id)
    {
        $item = CourseItem::find($id);

        $this->validate($request, [
            'name'          => 'required',
            'item_type_id'  => 'required',
        ]);

        if($request->hasFile('archive'))
        {            
            $old_itemPath = $item->path;
            $attach = $request->archive;
            //gera array aleatorio
            $count = 1;
            while($count != 0){
                $str = "";
                $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max = count($characters) - 1;
                for ($i = 0; $i < 7; $i++) {
                    $rand = mt_rand(0, $max);
                    $str .= $characters[$rand];
                }
                $path = 'uploads/archives/'.$str; 
                $count = CourseItem::where('path', $path)->count();
                $attach_new_name = $str;
            }

            $attach->move('uploads/archives', $attach_new_name); 
            $new_path = 'uploads/archives/'. $attach_new_name;
            if($old_itemPath.contains('vimeo')){            
                $vimeo_result = vimeo_tools::vimeo_edit($new_path,$item,$old_itemPath);                
                $item->path = $vimeo_result;
            }
            else {

                $item->path = 'uploads/archives/'. $new_path;       
            }
        }
        else {
            if($item->path != '' && $item->path.contains('vimeo'))
            {
                $vimeo_result = vimeo_delete($item->path);
            }
        }
        $item->name                 = $request->name;
        $item->desc                 = $request->desc;
        $item->course_item_types_id = $request->item_type_id;
        $item->save();

        Session::flash('success', 'Aula/Avaliação atualizada com sucesso');
        return redirect()->back();
    }



    /**
     * Remove the specified item from the chapter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function item_delete($id)
    {
        $item = CourseItem::find($id);

        foreach ($item->item_child as $child)
        {
            $child->course_item_options()->forceDelete();
        }
        
        $item->item_child()->forceDelete();
        
        if(strpos($item->path,"vimeo"))
        {
            vimeo_tools::vimeo_delete($item);
        }

        if(file_exists($item->path))
        {
            unlink(public_path().'/'. $item->path);
        }

        $item->delete();

        Session::flash('info', 'Aula/Avaliação deletada.');
        return redirect()->back();
    }

    /**
     * Store a newly alternative for the question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alt(Request $request, $id)
    {
        $this->validate($request, [
            'desc'      =>  'required',
            'trueFalse' =>  'required'
        ]);

        $order = DB::table('course_items')
        ->whereNull('course_items_parent')
        ->count();

        $alt = CourseItem::create([
            'name'                  =>  $request->desc,
            'desc'                  =>  $request->trueFalse,
            'course_item_group_id'  =>  $id,
            'course_item_types_id'  =>  $request->item_type_id,
            'course_items_parent'   =>  $request->id,
            'order'                 =>  $order
        ]);

        Session::flash('success', 'Alternativa adicionada com sucesso');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified alternative.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alt_edit($id)
    {
        $alt = CourseItem::find($id);
        

        return view('admin.courses.alternative')
        ->with('alt', $alt);

    }

    /**
     * Update the specified alternative in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alt_update(Request $request, $id)
    {
        $alt = CourseItem::find($id);

        $this->validate($request, [
            'desc'          => 'required',
            'trueFalse'     => 'required'
        ]);

        $alt->name   = $request->desc;
        $alt->desc   = $request->trueFalse;  
        $alt->save();

        Session::flash('success', 'Alternativa atualizada com sucesso!');
        return redirect()->route('course.item.edit', ['id' => $alt->course_items_parent]);
    }

    /**
     * Remove the specified alternative.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alt_delete($id)
    {
        $alt = CourseItem::find($id);

        $alt->delete();

        Session::flash('info', 'Alternativa excluida!');
        return redirect()->back();
    }

    public function diss_edit($id)
    {
        $diss = CourseItem::find($id);
        

        return view('admin.courses.dissertative')
        ->with('diss', $diss);

    }

    public function diss_update(Request $request, $id)
    {
        $diss = CourseItem::find($id);

        $this->validate($request, [
            'desc'          => 'required'
        ]);

        $diss->desc   = $request->desc; 
        $diss->save();

        Session::flash('success', 'Alternativa atualizada com sucesso!');
        return redirect()->route('course.item.edit', ['id' => $diss->course_items_parent]);
    }

    public function add_question_multiple($id, $name, $desc, $item_type_id)
    {

        $item = CourseItem::find($id);

        $multiple = new CourseItem;

        $multiple->name                     = $name;
        $multiple->desc                     = $desc;
        $multiple->course_item_group_id     = $item->course_item_group_id;
        $multiple->course_item_types_id     = $item_type_id;
        $multiple->course_items_parent      = $item->id;

        $order = DB::table('course_items')
        ->whereNotNull('course_items_parent')
        ->count();
        
        $multiple->order = $order;

        $multiple->save();

        return $multiple;
    }

    public function multiple(Request $request, $id)
    {

        $this->validate($request, [
            'afirmacao' => 'required',
        ]);
        $all_trues = $request->verdadeira;
        $variavel = $request->afirmacao;
        $funcao = $this->add_question_multiple($id, $request->name, $request->desc, $request->item_type_id);
        $all_requests = $request->all();
        
        return dd($variavel);
        if ($request->item_type_id == '6') {
            foreach ($all_requests as $key => $value) {
                if (strpos($key, 'verdadeira') !== false) {
                    $all_trues[] = explode('_', $key)[1];
                }
            }

            foreach ( $all_requests['afirmacao'] as $key => $value) {
                if($value == '' || $value == NULL){
                    continue;
                }
                else
                {
                    $multi = new CourseItemOption;
                    $multi->course_items_id = $funcao->id;
                    $multi->desc = $value;
                    $multi->checked = 0;
                    foreach ($all_trues as $verdadeiras) {
                        if ($key == $verdadeiras) {
                            $multi->checked = 1;
                        }    
                    }           
                } 
                $multi->save();
            }
        }
        if ($request->item_type_id == '9')
        {
            $this->validate($request, [
                'verdadeira'    => 'required',
            ]);

            foreach ( $all_requests['afirmacao'] as $key => $value) {
                if($value == '' || $value == NULL){
                    continue;
                }
                else
                {
                    $multi = new CourseItemOption;
                    $multi->course_items_id = $funcao->id;
                    $multi->desc = $value;
                    $multi->checked = 0;
                    if ($request->verdadeira == $key) {
                        $multi->checked = 1;
                    }               
                } 
                $multi->save();
            }
        }
        return redirect()->back();
    }

    public function storeAluno(Request $request, $id)
    {
        $this->validate($request, [
                'email'    => 'required',
            ]);
        $user = User::where('email', $request->email)->first();
        $course = Course::find($id);

        $item = CourseUser::where('user_id', $user->id)->where('course_id', $course->id)->count();

        if ($item > 0) {
            Session::flash('success', 'Este Usuário já esta no curso');
            return redirect()->back();
        }
        $user->courses()->save($course, ['progress' => 0]);
        Session::flash('success', 'Aluno vinculado ao curso '. $course->name);
        return redirect()->back();
    }
}