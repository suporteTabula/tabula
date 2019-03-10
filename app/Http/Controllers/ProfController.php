<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CustomClasses\vimeo_tools;
use App\User;
use App\Cupom;
use App\Course;
use App\UserType;
use App\Category;
use App\UserGroup;
use App\CourseUser;
use App\CourseItem;
use App\CourseItemUser;
use App\CourseItemType;
use App\CourseItemOption;
use App\CourseItemGroup;
use App\CourseItemStatus;
use Session;
use Auth;

            #################
            #Virar Professor#
            #################
class ProfController extends Controller
{
	public function virarProfessor(Request $request)
	{
		$user = User::find($request->id);


        $user->name         = $request->name;
        $user->birthdate    = $request->birthdate;
        $user->sex          = $request->sex;
        $user->occupation   = $request->occupation;
        $user->bio          = $request->bio;
        $user->website      = $request->website;
        $user->google_plus  = $request->google_plus;
        $user->twitter      = $request->twitter;
        $user->facebook     = $request->facebook;
        $user->youtube      = $request->youtube;
        $request->id = 3;
        
        $user->userTypes()->sync($request->id);
        $user->save();

        return redirect()->route('userPanel.single');

    }
        ######################
        #Tela Todos os Cursos#
        ######################
    public function index()
    {
        $user = Auth::user();
        $courses = Course::where('user_id_owner', $user->id)->get();
        $userCompanies = $user->userTypes()->first();
        
        if ($userCompanies->id == 5) {
            return view('companies.courses.index')
            ->with('courses', $courses)
            ->with('categories', Category::all())
            ->with('users', $user);
        }else{
            $courses = Course::where('user_id_owner', $user->id)->get();
            return view('teacher.courses.index')
            ->with('courses', $courses)
            ->with('categories', Category::all())
            ->with('users', $user);
        }
    }

            #####################
            #Tela Cadastro Curso#
            #####################

    public function create()
    {
        $auth = Auth::user();
        $userCompanies = $auth->userTypes()->first();
        if ($userCompanies->id == 5) {
            return view('companies.courses.create')
            ->with('categories', Category::all())
            ->with('user_groups', UserGroup::all());
        }else{
            return view('teacher.courses.create')
            ->with('categories', Category::all())
            ->with('user_groups', UserGroup::all());
        }

    }
            ########################
            #Realiza cadastro Curso#
            ########################

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|max:100',
            'desc'        => 'required',
            'price'       => 'required',
            'featured'    => 'required',
            'category_id' => 'required'
        ]);

        $course = new Course();

        $course->name          = $request->name;
        $course->desc          = $request->desc;
        $course->price         = $request->price;
        $course->category_id   = $request->category_id;
        $course->featured   = $request->featured;
        $course->requirements = $request->requirements;
        $course->user_id_owner = Auth::user()->id;
        $course->total_class = 0;

        $auth = Auth::user();
        $userCompanies = $auth->userTypes()->first();

        $course->price = str_replace(',', '.', $course->price);
        if($request->thumb_img != '')
        {
            $attach_thumb_img = $request->thumb_img;
            $attach_thumb_img_name = time().$attach_thumb_img->getClientOriginalName();
            $attach_thumb_img->move('images/aulas', $attach_thumb_img_name); 

            $course->thumb_img = $attach_thumb_img_name;  
        }
        else
            $course->thumb_img = 'e-learning.jpg'; 

        //Valida o video     
        if($request->video != '')
        {
            $attach_video = $request->video;
            $count = 1;
            while($count != 0){
                $str = "";
                $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max = count($characters) - 1;
                for ($i = 0; $i < 7; $i++) {
                    $rand = mt_rand(0, $max);
                    $str .= $characters[$rand];
                    $count = Course::where('video', $str)->count();
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
                $userGroup = UserGroup::find($checked);
                // vincula curso com o usergroup em questao
                $course->userGroups()->attach($userGroup);
                // remover essa linha e a coluna da tabela de grupos
                $course->group = 'ta dentro';
                $course->save();
            }
        }
        Session::flash('success', 'Curso criado com sucesso');

        $course = Course::find($id);
        $categories = Category::all();
        $course_items_group = CourseItemGroup::all();
        $user_groups = UserGroup::all();
        return redirect()->route('course.edit.teacher', 
            ['id' => $id,
            'course' => $course,
            'categories' => $categories,
            'course_items_group' => $course_items_group,
            'user_groups' => $user_groups]);

    }

            ######################
            #Tela Edição do Curso#
            ######################
    public function edit($id)
    {
        $course = Course::find($id);
        $course->price = str_replace('.', ',', $course->price);
        
        $auth = Auth::user();
        $userCompanies = $auth->userTypes()->first();
        if ($userCompanies->id == 5) {
            return view('companies.courses.edit')
            ->with('course', $course)
            ->with('categories', Category::all())
            ->with('course_items_group', CourseItemGroup::all())
            ->with('user', User::all())
            ->with('user_groups', UserGroup::all());
        }else{
            return view('teacher.courses.edit')
            ->with('course', $course)
            ->with('categories', Category::all())
            ->with('course_items_group', CourseItemGroup::all())
            ->with('user', User::all())
            ->with('user_groups', UserGroup::all());
        }

    }

            #########################
            #Realiza Edição do Curso#
            #########################
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $this->validate($request, [
            'name'        => 'required|max:100',
            'desc'        => 'required',
            'price'       => 'required',
            'category_id' => 'required'
        ]);

        $course->name        = $request->name;
        $course->desc        = $request->desc;
        $course->price       = $request->price;
        $course->category_id = $request->category_id;
        $course->requirements = $request->requirements;
        $course->featured    = $request->featured;        
        
        $course->price = str_replace(',', '.', $course->price);

        if($request->thumb_img != '')
        {
            $attach_thumb_img = $request->thumb_img;
            $attach_thumb_img_name = time().$attach_thumb_img->getClientOriginalName();
            $attach_thumb_img->move('images/aulas', $attach_thumb_img_name); 

            $course->thumb_img = $attach_thumb_img_name;  
        }
        else
            $course->thumb_img = 'e-learning.jpg';

        if($request->video != ''){
            $attach_video = $request->video;
            $count = 1;
            while($count != 0){
                $str = "";
                $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max = count($characters) - 1;
                for ($i = 0; $i < 7; $i++) {
                    $rand = mt_rand(0, $max);
                    $str .= $characters[$rand];
                }
                $count = Course::where('video', $str)->count();
                $attach_video_name = $str;
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
                ##############
                #Deleta Curso#
                ##############
    public function destroy($id)
    {
        $course = Course::find($id);

        $course->delete();

        Session::flash('success', 'Curso removido com sucesso');
        return redirect()->back();
    }


    public function chapter(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'desc'      => 'required'
        ]);

            ############################
            #Cria Capitulo para o Curso#
            ############################
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

            ##################################
            #Tela Ediçao do Capitulo do Curso#
            ##################################

    public function chapter_edit($id)
    {
        $chapter = CourseItemGroup::find($id);

        $auth = Auth::user();
        $userCompanies = $auth->userTypes()->first();
        if ($userCompanies->id == 5) {

            return view('companies.courses.chapter')
            ->with('chapter', $chapter)
            ->with('items', CourseItem::all())
            ->with('items_type', CourseItemType::all());
        }else{
            return view('teacher.courses.chapter')
            ->with('chapter', $chapter)
            ->with('items', CourseItem::all())
            ->with('items_type', CourseItemType::all());
        }

    }
            #####################################
            #Realiza Ediçao do Capitulo do Curso#
            #####################################


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
            ###############################
            #Exclusão do Capitulo do Curso#
            ###############################

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

            #######################
            #Cria Item do Capitulo#
            #######################
    public function item(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required'
        ]);        
        $item = new CourseItem;
        
        $item->name                     = $request->name;
        if(isset($request->desc))
        {
            $item->desc                 = $request->desc;
        }
        $item->course_item_group_id     = $id;
        $item->course_item_types_id     = $request->item_type_id;
        $item->course_items_parent      = NULL;
        

        if(isset($request->archive))
        {
            $attach = $request->archive;
            $attach_new_name = time().$attach->getClientOriginalName();
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
        Session::flash('success', 'Sessão adicionada com sucesso');
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

    
    public function item_edit($id)
    {
        $item = CourseItem::find($id);
        $chapter = CourseItemGroup::find($item->course_item_group_id);
        $user = Auth::user();
        $userCompanies = $user->userTypes()->first();
        if ($userCompanies->id == 5) {
            if($item->course_item_type->id >= 6)
            {
                return view('companies.courses.question')
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
                return view('companies.courses.item')
                ->with('item', $item)
                ->with('items', $items)
                ->with('chapter', $chapter)    
                ->with('items_type', CourseItemType::all());
            }     
        }else{
            if($item->course_item_type->id >= 6)
            {
                return view('teacher.courses.question')
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
                return view('teacher.courses.item')
                ->with('item', $item)
                ->with('items', $items)
                ->with('chapter', $chapter)    
                ->with('items_type', CourseItemType::all());
            }        
        }
    }


    public function item_update(Request $request, $id)
    {
        $item = CourseItem::find($id);
        $path = $item->path;

        $this->validate($request, [
            'name'          => 'required',
            'item_type_id'  => 'required',
        ]);

        if($request->hasFile('archive'))
        {            
            $old_itemPath = $item->path;
            $attach = $request->archive;
            $attach_new_name = time().$attach->getClientOriginalName();
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
            if($path != '' && $path.contains('vimeo'))
            {
                $vimeo_result = vimeo_tools::vimeo_delete($path);
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

        Session::flash('info', 'Aula/Avaliação deletada com sucesso');
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
        $user = Auth::user();
        $userCompanies = $user->userTypes()->first();
        if ($userCompanies->id == 5) {
            return view('companies.courses.alternative')
            ->with('alt', $alt);
        }else{
            return view('teacher.courses.alternative')
            ->with('alt', $alt);
        }
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

        $all_trues = array();
        $variavel = array();
        $funcao = $this->add_question_multiple($id, $request->name, $request->desc, $request->item_type_id);
        $all_requests = $request->all();
        
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

    public function cupomIndex(){
        $auth = Auth::user()->id;
        $cupoms = Cupom::where('user_id', $auth)->get();

        foreach ($cupoms as $cupom) {
        $cupom->expira_cupom = explode('-', $cupom->expira_cupom);
        $cupom->expira_cupom = $cupom->expira_cupom[2] . '/' . $cupom->expira_cupom[1] . '/' . $cupom->expira_cupom[0];
        }


       // return dd($users);
        return view('teacher.cupom.index')
        ->with('users', User::all())
        ->with('courses', Course::all())
        ->with('cupoms', $cupoms);
    }

    public function cupomCreate()
    {
        $auth = Auth::user()->id;
        $cupoms = Cupom::where('user_id', $auth)->get();
        $cursos = Course::where('user_id_owner', $auth)->get();
        //return dd($cursos);
        return view('teacher.cupom.create')
        ->with('cupoms', $cupoms)
        ->with('users', User::all())
        ->with('cursos', $cursos);
    }

    public function cupomStore(Request $request)
    {   //valida os campos digitados
        $this->validate($request, [
            'valorCupom'  => 'required|max:100',
            'codCupom' => 'required|max:100'
        ]);
        //Vincula as variaveis 
        
        $auth = Auth::user()->id;
        if ($request->limiteCupom == null || $request->limiteCupom == '') {
            $request->limiteCupom = 0;
        }

        $expiraCupom = explode('/', $request->expiraCupom);
        $expiraCupom = $expiraCupom[2] . '-' . $expiraCupom[1] . '-' . $expiraCupom[0];

        Cupom::create([
            'cod_cupom' => $request->codCupom,
            'tipo_cupom' => $request->tipoCupom,
            'valor_cupom' => $request->valorCupom,
            'expira_cupom' => $expiraCupom,
            'limite_cupom' => $request->limiteCupom,
            'desc_cupom' => $request->descCupom,
            'curso_id' => $request->curso_id,
            'user_id' =>$auth
        ]);
        // se tiver algum check nos grupos de usuário

        Session::flash('success', 'Cupom criado com sucesso');


        return redirect()->route('cupom.teacher');
    }

    public function cupomEdit($id)
    {   
        $auth = Auth::user()->id;
        $cupom = Cupom::find($id);
        $cursos = Course::where('user_id_owner', $auth)->get();

        $cupom->expira_cupom = explode('-', $cupom->expira_cupom);
        $cupom->expira_cupom = $cupom->expira_cupom[2] . '/'. $cupom->expira_cupom[1] . '/' . $cupom->expira_cupom[0];

        return view('teacher.cupom.edit')
        ->with('cupom', $cupom)
        ->with('users', User::all())
        ->with('cursos', $cursos);
    }

    public function cupomUpdate(Request $request)
    {   //valida os campos digitados
        $this->validate($request, [
            'valorCupom'  => 'required|max:100',
            'codCupom' => 'required|max:100'
        ]);
        //Vincula as variaveis 
        
        $auth = Auth::user()->id;

        $expiraCupom = explode('/', $request->expiraCupom);
        $expiraCupom = $expiraCupom[2] . '-' . $expiraCupom[1] . '-' . $expiraCupom[0];

        Cupom::where('id', $request->id)->update([
            'cod_cupom' => $request->codCupom,
            'tipo_cupom' => $request->tipoCupom,
            'valor_cupom' => $request->valorCupom,
            'expira_cupom' => $expiraCupom,
            'limite_cupom' => $request->limiteCupom,
            'desc_cupom' => $request->descCupom,
            'curso_id' => $request->curso_id,
            'user_id' =>$auth
        ]);        
        Session::flash('success', 'Cupom Editado com sucesso');
        return redirect()->back();
    }

    public function cupomDestroy($id)
    {
        $cupom = Cupom::find($id);

        $cupom->delete();

        Session::flash('success', 'Cupom removido com sucesso');
        return redirect()->back();
    }
    public function todosProfs()
    {
        $userTeachers = User::all();
        $myTpes = DB::table('user_user_type')->get();
        return view('todosProfs')
        ->with('myTpes', $myTpes)
        ->with('userTeachers', $userTeachers)
        ->with('auth', Auth::user());
    }

    public function courseProf($id)
    {
        $courses = Course::where('user_id_owner', $id)->get(); 
        return view('teacher.courseProfs')
        ->with('auth', Auth::user())
        ->with('courses', $courses);
    }

    public function alunosTeacher($id)
    {
        $alunos = CourseUser::where('course_id', $id)->get();
        $course = Course::find($id);
        $course->total = 0;
        $chapter = $course->course_item_groups->all();
        //Verificar o total de aulas possui o curso
        foreach ($chapter as $chapters) {   
            $itemChapter = CourseItem::where('course_item_group_id', $chapters->id)->count();
            $course->total = $course->total + $itemChapter;
        }

        foreach ($alunos as $aluno) {
            $aluno->dados = User::where('id', $aluno->user_id)->first();
            if ($aluno->progress == 0) {
                $aluno->progress = 0;
            }else
            $aluno->progress = ($aluno->progress / $course->total)*100;
        }

        $userTypes = Auth::user()->userTypes()->first();
        if ($userTypes->desc == "Admin") {
            return view('admin.courses.alunos')->with('alunos', $alunos)->with('id', $course->id);
        }else{
        return view('teacher.courses.alunos')
        ->with('alunos', $alunos)
        ->with('id', $course->id)
        ->with('courses', Course::all());
        }
       
    }

    public function alunosReset($id)
    {
        CourseUser::where('id', $id)->update([
            'progress' => 0,
        ]);
        Session::flash('success', 'Progresso Reiniciado');
        return redirect()->back();
    }

    public function alunosDestroy($id)
    {
        $aluno = CourseUser::find($id);
        $aluno->delete();

        Session::flash('success', 'Aluno removido com sucesso');
        return redirect()->back();
    }

    public function certificateGenerate($id)
    {
        $aluno = CourseUser::find($id);
        $course = Course::find($aluno->course_id);
        $course->total = 0;
        $chapter = $course->course_item_groups->all();

        foreach ($chapter as $chapters) {   
            $itemChapter = CourseItem::where('course_item_group_id', $chapters->id)->count();
            $course->total = $course->total + $itemChapter;
        }
        if ($aluno->progress != $course->total) {
            Session::flash('success', 'O Aluno não finalizou o curso');
            return redirect()->back();
        }else{
            
        }

        return dd($aluno);

    }
}
