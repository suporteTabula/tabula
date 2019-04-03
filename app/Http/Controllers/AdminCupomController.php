<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Category;
use App\Cupom;
use Session;
use Auth;

class AdminCupomController extends Controller
{
	public function index(){
        $auth = Auth::user();
        $cupoms = Cupom::where('user_id', $auth->id)->get();

        if ($auth->userTypes->first()->id == 3) {
           return view('teacher.cupom.index')
            ->with('users', User::all())
            ->with('courses', Course::all())
            ->with('cupoms', $cupoms);
        }
        if ($auth->userTypes->first()->id == 5) {
            return view('companies.cupom.index')
            ->with('users', User::all())
            ->with('courses', Course::all())
            ->with('cupoms', $cupoms);
        }

        return view('admin.cupom.index')
		->with('users', User::all())
		->with('courses', Course::all())
		->with('cupoms', Cupom::all())
        ->with('categories', Category::all());
	}

	public function create()
	{
        $auth = Auth::user();
        $cupoms = Cupom::where('user_id', $auth->id)->get();
        $cursos = Course::where('user_id_owner', $auth->id)->get();
        if ($auth->userTypes->first()->id == 3) {
            return view('teacher.cupom.create')
            ->with('cupoms', $cupoms)
            ->with('users', User::all())
            ->with('cursos', $cursos);
        }
        if ($auth->userTypes->first()->id == 5) {
            return view('companies.cupom.create')
            ->with('cupoms', $cupoms)
            ->with('users', User::all())
            ->with('cursos', $cursos);
        }
		return view('admin.cupom.create')
		->with('users', User::all())
		->with('cursos', Course::all())
        ->with('categories', Category::all());
	}

	public function store(Request $request)
    {   //valida os campos digitados
    	$this->validate($request, [
    		'valorCupom'  => 'required|max:100',
    		'codCupom'    => 'required|max:100'
    	]);
    	$auth = Auth::user();
        if (Cupom::where('cod_cupom', $request->codCupom)->count() != 0) {
            Session::flash('info', 'Código já em uso');
            return redirect()->back();
        }
            
        $cupom = new Cupom;
        $cupom->cod_cupom       = $request->codCupom;
        $cupom->desc_cupom      = $request->descCupom;
        $cupom->tipo_cupom      = $request->tipoCupom;
        $cupom->valor_cupom     = $request->valorCupom;
        $cupom->active          = 1;
        $cupom->type_id         = serialize($request->type_id);
        $cupom->user_id         = $auth->id;
        
        $cupom->save();

    	Session::flash('success', 'Cupom criado com sucesso');


    	return redirect()->back();
    }

    public function edit($id)
    {
        $auth = Auth::user();
        $cupom = Cupom::find($id);
        $cupom->type_id = unserialize($cupom->type_id);
        if ($auth->userTypes->first()->id == 3) {
            $cursos = Course::where('user_id_owner', $auth->id)->get();
            return view('teacher.cupom.edit')
            ->with('cupom', $cupom)
            ->with('users', User::all())
            ->with('cursos', $cursos);
        }
        if ($auth->userTypes->first()->id == 5) {
            $cursos = Course::where('user_id_owner', $auth->id)->get();
            return view('companies.cupom.edit')
            ->with('cupom', $cupom)
            ->with('users', User::all())
            ->with('cursos', $cursos);
        }
    	return view('admin.cupom.edit')
    	->with('cupom', $cupom)
    	->with('users', User::all())
    	->with('cursos', Course::all())
        ->with('category', Category::all());
    }

    public function update(Request $request, $id)
    {   //valida os campos digitados
    	$this->validate($request, [
    		'valorCupom'  => 'required|max:100',
    		'codCupom' => 'required|max:100'
    	]);
        //Vincula as variaveis 
    	
    	$auth = Auth::user();

        $cupom = Cupom::find($id);
        $cupom->cod_cupom       = $request->codCupom;
        $cupom->desc_cupom      = $request->descCupom;
        $cupom->tipo_cupom      = $request->tipoCupom;
        $cupom->valor_cupom     = $request->valorCupom;
        $cupom->active          = 1;
        $cupom->type_id         = serialize($request->type_id);
        $cupom->user_id         = $auth->id;
        
        $cupom->save();
   
    	Session::flash('success', 'Cupom Editado com sucesso');
    	return redirect()->back();
    }

    public function search(Request $request)
    {
        $auth = Auth::user();
        $search = array();  
        if ($request->type == 'produto') {
            if ($auth->userTypes->first()->id == 1 || $auth->userTypes->first()->id == 4) {
                $searchs = Course::where('name', 'like', '%'.$request->searchTerm.'%');
            }else{
                $searchs = Course::where('name', 'like', '%'.$request->searchTerm.'%')->where('user_id_owner', $auth->id);
            }
         }elseif ($request->type == 'macrotema') {
            $searchs = Category::where('desc', 'like', '%'.$request->searchTerm.'%')->whereNull('category_id_parent');
         }else{
            $searchs = Category::where('desc', 'like', '%'.$request->searchTerm.'%')->where('category_id_parent', '<>', '');
         }

        if ($searchs->count() != 0) {
            if ($request->type == 'produto') {
                foreach ($searchs->get() as $sch) {
                    $search[] = ['id' => $sch->id, 'text' => $sch->name];
                }       
            }else{
                foreach ($searchs->get() as $sch) {
                    $search[] = ['id' => $sch->id, 'text' => $sch->desc];
                }   
            }
        }

        return json_encode($search);
    }

    public function destroy($id)
    {
        $cupom = Cupom::find($id);

        $cupom->delete();

        Session::flash('success', 'Cupom removido com sucesso');
        return redirect()->back();
    }


}
