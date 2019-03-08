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
    		'user_id' =>  $auth
    	]);

    	Session::flash('success', 'Cupom criado com sucesso');


    	return redirect()->back();
    }

    public function edit($id)
    {
    	$cupom = Cupom::find($id);

        $cupom->expira_cupom = explode('-', $cupom->expira_cupom);
        $cupom->expira_cupom = $cupom->expira_cupom[2] . '/'. $cupom->expira_cupom[1] . '/' . $cupom->expira_cupom[0];

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

    public function destroy($id)
    {
        $cupom = Cupom::find($id);

        $cupom->delete();

        Session::flash('success', 'Cupom removido com sucesso');
        return redirect()->back();
    }
}
