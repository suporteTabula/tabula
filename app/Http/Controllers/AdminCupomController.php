<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use Session;
use Auth;
use App\Cupom;

class AdminCupomController extends Controller
{
	public function index(){
		return view('admin.cupom.index')
		->with('users', User::all())
		->with('courses', Course::all())
		->with('cupoms', Cupom::all());
	}

	public function create()
	{
		$cupoms = Cupom::all();
    	//return dd(Course::all());
		return view('admin.cupom.create')
		->with('cupoms', $cupoms)
		->with('users', User::all())
		->with('cursos', Course::all());
	}

	public function store(Request $request)
    {   //valida os campos digitados
    	$this->validate($request, [
    		'valorCupom'  => 'required|max:100',
    		'codCupom' => 'required|max:100'
    	]);
        //Vincula as variaveis 
    	
    	$user = Auth::user()->id;
    	if ($request->limiteCupom == null || $request->limiteCupom == '') {
    		$request->limiteCupom = 0;
    	}


    	Cupom::create([
    		'codCupom' => $request->codCupom,
    		'tipoCupom' => $request->tipoCupom,
    		'valorCupom' => $request->valorCupom,
    		'expiraCupom' => $request->expiraCupom,
    		'limiteCupom' => $request->limiteCupom,
    		'descCupom' => $request->descCupom,
    		'curso_id' => $request->curso_id,
    		'user_id' =>$user
    	]);
        // se tiver algum check nos grupos de usuário

    	Session::flash('success', 'Curso criado com sucesso');


    	return redirect()->back();
    }

    public function edit($id)
    {
    	$cupom = Cupom::find($id);

    	return view('admin.cupom.edit')
    	->with('cupom', $cupom)
    	->with('users', User::all())
    	->with('cursos', Course::all());
    }

    public function update(Request $request)
    {   //valida os campos digitados
    	$this->validate($request, [
    		'valorCupom'  => 'required|max:100',
    		'codCupom' => 'required|max:100'
    	]);
        //Vincula as variaveis 
    	
    	$user = Auth::user()->id;


    	Cupom::where('id', $request->id)->update([
    		'codCupom' => $request->codCupom,
    		'tipoCupom' => $request->tipoCupom,
    		'valorCupom' => $request->valorCupom,
    		'expiraCupom' => $request->expiraCupom,
    		'limiteCupom' => $request->limiteCupom,
    		'descCupom' => $request->descCupom,
    		'curso_id' => $request->curso_id,
    		'user_id' =>$user
    	]);        
    	Session::flash('success', 'Curso Editado com sucesso');
    	return redirect()->back();
    }

    public function destroy($id)
    {
        $cupom = Cupom::find($id);

        $cupom->delete();

        Session::flash('success', 'Curso removido com sucesso');
        return redirect()->back();
    }
}
