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

class AdminCoursesController extends Controller
{
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
            $course->thumb_img = 'default.jpg'; 

        $course->save();

        if($request->group != '')
            foreach($request->group as $checked) 
            {
                $userGroup = UserGroup::find($checked);
                $course->userGroups()->attach($userGroup);
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
            $course->thumb_img = 'default.jpg';

        $userGroups = UserGroup::all();
        foreach($userGroups as $userGroup) 
        {
            if($userGroup->courses->contains($course))
            {   
                $remove = true;
                if($request->group)
                    foreach($request->group as $checked) 
                        if($userGroup->id == $checked)
                            $remove = false;

                if($remove)
                    $course->userGroups()->detach($userGroup);
            }
            else
            {
                $add = false;
                if($request->group)
                    foreach($request->group as $checked) 
                        if($userGroup->id == $checked)
                            $add = true;
                if($add)
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
            'name'          => 'required',
            'item_type_id'  => 'required',
        ]);

        $item = new CourseItem;
        
        $item->name                     = $request->name;
        $item->desc                     = $request->desc;
        $item->course_item_group_id     = $id;
        $item->course_item_types_id     = $request->item_type_id;
        $item->course_items_parent  = NULL;
        
               
        if(isset($request->archive))
        {
            $attach = $request->archive;
            $attach_new_name = time().$attach->getClientOriginalName();
            $attach->move('uploads/archives', $attach_new_name); 
            $item->path = 'uploads/archives/'. $attach_new_name;     
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
                    ->with('items_type', CourseItemType::all())
                    ->with('item_options', CourseItemOption::all());
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

        foreach ($item->course_item_options as $item_options)
        {
            $item_options->forceDelete();
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

        $alt = CourseItemOption::create([
            'desc'              =>  $request->desc,
            'course_items_id'   =>  $id,
            'checked'           =>  $request->trueFalse
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
        $alt = CourseItemOption::find($id);

        return view('admin.courses.alternative')->with('alt', $alt);
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
        $alt = CourseItemOption::find($id);

        $this->validate($request, [
            'desc'          => 'required',
            'trueFalse'     => 'required'
        ]);

        $alt->desc      = $request->desc;
        $alt->checked   = $request->trueFalse;  
        $alt->save();

        Session::flash('success', 'Alternativa atualizada com sucesso!');
        return redirect()->route('course.item.edit', ['id' => $alt->course_items_id]);
    }

    /**
     * Remove the specified alternative.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alt_delete($id)
    {
        $alt = CourseItemOption::find($id);

        $alt->delete();

        Session::flash('info', 'Alternativa excluida!');
        return redirect()->back();
    }
}
