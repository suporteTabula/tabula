<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CustomClasses\vimeo_tools;
use App\User;
use App\Cupom;
use App\Course;
use App\Teacher;
use App\UserType;
use App\Category;
use App\UserGroup;
use App\CourseUser;
use App\CourseItem;
use App\CourseItemType;
use App\CourseItemUser;
use App\CourseItemOption;
use App\CourseItemGroup;
use App\CourseItemStatus;
use Session;
use Auth;
use PDF;

class ProfController extends Controller
{
    



    public function beTeacher()
    {
        if (Auth::user()) {
        $auth = Auth::user();

        $teacher = Teacher::where('user_id', $auth->id);

        if ($teacher->count() > 0) {
            if($teacher->first()->answer_first === null){

                return view('teacher.form.tela1')->with('auth', $auth);
            }
            if($teacher->first()->answer_second === null){

                return view('teacher.form.tela2')->with('auth', $auth);
            }
            if($teacher->first()->answer_third === null){

                return view('teacher.form.tela3')->with('auth', $auth);
            }
            return redirect()->route('teacher');
        }
        Teacher::create([
            'user_id'   =>  $auth->id 
        ]);

        return view('teacher.form.tela1')->with('auth', $auth);
        }
        $session = session(['teacher' => 0]);
        return redirect()->route('register');
    }

    public function storeAnswer(Request $request)
    {
        $auth = Auth::user();

        Teacher::where('user_id', $auth->id)->update([
            $request->row      => $request->answer
       ]);
        return redirect()->route('beTeacher');
    }

    public function destroyAnswer($id)
    {
        $auth = Auth::user();

        Teacher::where('user_id', $auth->id)->update([
            $id     => null
       ]);

        return redirect()->route('beTeacher');
    }


	public function virarProfessor(Request $request)
	{
		$user = Auth::user();

       
        $userType = 3;
        
        $user->userTypes()->sync($userType);
        $user->save();
        $course = Course::where('user_id_owner', $user->id)->count();
        Session::flash('success', 'Parabéns, você é o mais novo professor no Tabula, crie um curso agora mesmo');
        return redirect()->route('userPanel.single')
            ->with('myCourse', $course);

    }

    public function analise($id)
    {
        $course = Course::find($id);
        $course->avaliable = 0;
        $course->save();
        Session::flash('success', 'Seu conteúdo foi enviado para avaliação, retornaremos em breve.');
        return redirect()->back();
    }

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

    public function todosProfs()
    {
        $teachers = User::all();
        foreach ($teachers as $teacher) {
            $teacher->courses = Course::where('user_id_owner', $teacher->id);
        }
        return view('todosProfs')
        ->with('teachers', $teachers)
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

    public function certificateGenerate($id)
    {

        $aluno = CourseUser::find($id);
        $course = Course::find($aluno->course_id);
        $teacher = User::find( $course->user_id_owner);
        $company = null;
        if ($teacher->empresa_id != NULL) {
            $company = Find($teacher->empresa_id);
        }
        $course->total = 0;
        $chapter = $course->course_item_groups->all();
        $now = date("Y-m-d H:i:s");

        $data = [
            'date'      => $now,
            'aluno'     => $aluno,
            'course'    => $course,
            'teacher'   => $teacher,
            'empresa'   => $company
            ];
            $pdf = PDF::loadView('pdf.document', $data);
            return $pdf->stream('document.pdf');

        foreach ($chapter as $chapters) {   
            $itemChapter = CourseItem::where('course_item_group_id', $chapters->id)->count();
            $course->total = $course->total + $itemChapter;
        }
        if ($aluno->progress != $course->total) {
            Session::flash('success', 'O Aluno não finalizou o curso');
            return redirect()->back();
        }else{
            
            
        }

    }
}
