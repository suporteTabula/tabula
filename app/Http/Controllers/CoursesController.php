<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Category;
use App\Course;
use App\User;
use App\CourseItemType;
use App\CourseItemGroup;
use App\CourseItem;

class CoursesController extends Controller
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
            ->with('categories', Category::all());
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
            'category_id' => 'required'
        ]);

        $course = Course::create([
            'name'          => $request->name,
            'desc'          => $request->desc,
            'category_id'   => $request->category_id,
            'user_id_owner' => Auth::user()->id
        ]);

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
            ->with('course_items_group', CourseItemGroup::all());
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
            'category_id' => 'required'
        ]);
        
        $course->name           = $request->name;
        $course->desc           = $request->desc;
        $course->category_id    = $request->category_id;

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

    public function chapter(Request $request, $id)
    {
        $course_item_group = CourseItemGroup::create([
            'name'      =>  $request->name,
            'desc'      =>  $request->desc,
            'course_id' =>  $id
        ]);

        Session::flash('success', 'Capítulo adicionado com sucesso');
        return redirect()->back();
    }

    public function chapter_edit($id)
    {
        $chapter = CourseItemGroup::find($id);

        return view('admin.courses.chapter')
                ->with('chapter', $chapter)
                ->with('items', CourseItem::all())
                ->with('items_type', CourseItemType::all());
    }

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
    public function item(Request $request, $id)
    {
        $item = CourseItem::create([
            'name'                  => $request->name,
            'desc'                  => $request->desc,
            'course_item_group_id'  => $id,
            'course_item_types_id'  => $request->item_type_id
        ]);

        Session::flash('success', 'Aula/Avaliação adicionada com sucesso');
        return redirect()->back();
    }

    public function item_edit($id)
    {
        $item = CourseItem::find($id);

        return view('admin.courses.item')
                    ->with('item', $item)
                    ->with('items_type', CourseItemType::all());
    }

    public function item_update(Request $request, $id)
    {
        $item = CourseItem::find($id);

        $this->validate($request, [
            'name'          => 'required',
            'desc'          => 'required',
            'item_type_id'  => 'required',
        ]);

        $item->name                 = $request->name;
        $item->desc                 = $request->desc;
        $item->course_item_types_id = $request->item_type_id;
        $item->save();

        Session::flash('success', 'Aula/Avaliação atualizada com sucesso');
        return redirect()->back();
    }
    public function item_delete($id)
    {
        $item = CourseItem::find($id);

        $item->delete();

        Session::flash('info', 'Aula/Avaliação deletada com sucesso');
    }
}
