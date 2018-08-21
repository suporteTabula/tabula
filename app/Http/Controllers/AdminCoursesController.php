<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Category;
use App\Course;
use App\User;
use App\UserGroup;
use App\CourseItemType;
use App\CourseItemGroup;
use App\CourseItem;
use App\CourseItemOption;
use Illuminate\Support\Facades\DB;
use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;

class AdminCoursesController extends Controller
{
	/**
	* Deal with the Vimeo API
	*
	* We need to check a bunch of settings and then attempt the upload. We should return the URL of the video
	* @param string $videoPath
	* @return string $vimeoPath
	*/
	public function vimeo_upload($videoPath)
	{		
		if (empty(env('VIMEO_TOKEN', 'default'))) {
			throw new Exception(
				'You can not upload a file without an access token. You can find this token on your app page, or generate ' .
				'one using `auth.php`.'
			);
		}
		$lib = new Vimeo(env('VIMEO_CLIENT_ID', 'default'), env('VIMEO_CLIENT_SECRET', 'default'), env('VIMEO_TOKEN', 'default'));
		$file_name = $videoPath;
		try {
			// Upload the file and include the video title and description.
			$uri = $lib->upload($file_name, array(
				'name' => 'Vimeo API SDK test upload',
				'description' => "This video was uploaded through the Vimeo API's PHP SDK."
			));
			// Get the metadata response from the upload and log out the Vimeo.com url
			$video_data = $lib->request($uri . '?fields=link');
			echo '"' . $file_name . ' has been uploaded to ' . $video_data['body']['link'] . "\n";
		}
		catch (VimeoUploadException $e) {
			// We may have had an error. We can't resolve it here necessarily, so report it to the user.
			echo 'Error uploading ' . $file_name . "\n";
			echo 'Server reported: ' . $e->getMessage() . "\n";
		} catch (VimeoRequestException $e) {
			echo 'There was an error making the request.' . "\n";
			echo 'Server reported: ' . $e->getMessage() . "\n";
		}
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    {
        $this->validate($request, [
            'name'        => 'required|max:100',
            'desc'        => 'required',
            'price'       => 'required',
            'category_id' => 'required'
        ]);

        $course = new Course();

        $course->name = $request->name;
        $course->desc = $request->desc;
        $course->category_id = $request->category_id;
        $course->price = $request->price;
        $course->user_id_owner = Auth::user()->id;

        if($request->thumb_img != '')
        {
            $attach_thumb_img = $request->thumb_img;
            $attach_thumb_img_name = time().$attach_thumb_img->getClientOriginalName();
            $attach_thumb_img->move('images/aulas', $attach_thumb_img_name); 

            $course->thumb_img = $attach_thumb_img_name;  
        }
        else
            $course->thumb_img = 'e-learning.jpg'; 

        $course->save();

        // se tiver algum check nos grupos de usuário
        if($request->group != '')
            foreach($request->group as $checked) 
            {
                $userGroup = UserGroup::find($checked);
                // vincula curso com o usergroup em questao
                $course->userGroups()->attach($userGroup);
                // remover essa linha e a coluna da tabela de grupos
                $course->group = 'ta dentro';
                $course->save();
            }

        Session::flash('success', 'Curso criado com sucesso');
        return redirect()->route('courses');
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
            'category_id' => 'required'
        ]);

        $course->name        = $request->name;
        $course->desc        = $request->desc;
        $course->category_id = $request->category_id;
        $course->price       = $request->price;

        if($request->thumb_img != '')
        {
            $attach_thumb_img = $request->thumb_img;
            $attach_thumb_img_name = time().$attach_thumb_img->getClientOriginalName();
            $attach_thumb_img->move('images/aulas', $attach_thumb_img_name); 

            $course->thumb_img = $attach_thumb_img_name;  
        }
        else
            $course->thumb_img = 'e-learning.jpg';

        // busca TODOS os usergroups para serem comparados com:
        // - os CHECKS 
        // - os vínculos do grupo aos userGroups
        $userGroups = UserGroup::all();
        // grupo por grupo
        foreach($userGroups as $userGroup) 
        {
            // se o curso PERTENCE ao grupo
            if($userGroup->courses->contains($course))
            {   
                // seta condição de remoção do grupo como verdadeira
                $remove = true;

                //verifica se existe algum CHECK no request
                if($request->group)
                    // lista cada um dos CHECKS
                    foreach($request->group as $checked) 
                        // se o id do CHECK for igual ao id do GRUPO (do foreach)
                        if($userGroup->id == $checked)
                            // curso não será removido do grupo
                            $remove = false;

                if($remove)
                    // remove curso do grupo
                    $course->userGroups()->detach($userGroup);
            }
            // se o curso NÃO PERTENCE ao grupo
            else
            {
                // seta condição de adição no grupo como falsa
                $add = false;

                //verifica se existe algum CHECK no request
                if($request->group)
                    // lista cada um dos CHECKS
                    foreach($request->group as $checked) 
                        // se o id do CHECK for igual ao id do GRUPO (do foreach)
                        if($userGroup->id == $checked)
                            // curso será adicionado do grupo
                            $add = true;
                if($add)
                    // adiciona curso ao grupo
                    $course->userGroups()->attach($userGroup);
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
            $attach_new_name = time().$attach->getClientOriginalName();
            $attach->move('uploads/archives', $attach_new_name); 
            $item->path = 'uploads/archives/'. $attach_new_name;   
			if($request->vimeo == 1){
				$vimeo_result = $this->vimeo_upload($item->path);
			}			
        }

        $order = DB::table('course_items')
                            ->whereNull('course_items_parent')
                            ->count();
        
        $item->order = $order;

        $item->save();
        Session::flash('success', 'Aula/Avaliação adicionada com sucesso');
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
            $item->path = 'uploads/archives/'. $attach_new_name;     
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

        if($item->course_item_type->id >= 5)
        {
            return view('admin.courses.question')
                    ->with('item', $item)
                    ->with('items', CourseItem::all())
                    ->with('chapter', $chapter)
                    ->with('items_type', CourseItemType::all());
        }
        else
        {
            return view('admin.courses.item')
                    ->with('item', $item)
                    ->with('items', CourseItem::all())
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
            $attach = $request->archive;
            $attach_new_name = time().$attach->getClientOriginalName();
            $attach->move('uploads/archives', $attach_new_name); 
            $item->path = 'uploads/archives/'. $attach_new_name;
			if($request->vimeo == 1){
				$vimeo_result = $this->vimeo_upload($item->path);
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
}