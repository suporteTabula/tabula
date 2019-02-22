<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
use Session;
use App\State;
use App\Country;
use App\Schooling;
use App\UserGroup;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        return view('admin.users.index')
        ->with('users', User::all())
        ->with('usersType', UserType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersType = UserType::all();
        return view('admin.users.create')->with('usersType', $usersType)
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('schoolings', Schooling::all())
        ->with('userGroups', UserGroup::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $this->validate($request, [
            'login'         => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'sex'           => 'required',
            'nickname'      => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
            'usersType'     => 'required'
        ]);

        $user->login        = $request->login;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password);
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->nickname     = $request->nickname;
        $user->birthdate    = $request->birthdate;
        $user->sex          = $request->sex;
        $user->occupation   = $request->occupation;
        $user->bio          = $request->bio;
        $user->website      = $request->website;
        $user->google_plus  = $request->google_plus;
        $user->twitter      = $request->twitter;
        $user->facebook     = $request->facebook;
        $user->youtube      = $request->youtube;
        $user->state_id     = $request->state_id;
        $user->country_id   = $request->country_id;
        $user->schooling_id = $request->schooling_id;
        $user->youtube      = $request->youtube;

        $user->save();

        $user->userTypes()->attach($request->usersType);

        // se tiver algum check nos grupos de usuário
        if($request->group != '')
            foreach($request->group as $checked) 
            {
                $userGroup = UserGroup::find($checked);
                // vincula user com o usergroup em questao
                $user->userGroups()->attach($userGroup);
                // remover essa linha e a coluna da tabela de usuários
                $user->group = 'ta dentro';
                $user->save();
            }

            Session::flash('success', 'Usuário adicionado com sucesso');
            return redirect()->route('users');
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
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user)
        ->with('usersType', UserType::all())
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('schoolings', Schooling::all())
        ->with('userGroups', UserGroup::all());
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
        $user = User::find($id);

        $this->validate($request, [
            'login'         => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'sex'           => 'required',
            'nickname'      => 'required',
            'email'         => 'required|email',
        ]);

        $user->login        = $request->login;
        $user->email        = $request->email;
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->nickname     = $request->nickname;
        $user->birthdate    = $request->birthdate;
        $user->sex          = $request->sex;
        $user->occupation   = $request->occupation;
        $user->bio          = $request->bio;
        $user->website      = $request->website;
        $user->google_plus  = $request->google_plus;
        $user->twitter      = $request->twitter;
        $user->facebook     = $request->facebook;
        $user->youtube      = $request->youtube;

        // busca TODOS os usergroups para serem comparados com:
        // - os CHECKS 
        // - os vínculos do usuário aos userGroups
        $userGroups = UserGroup::all();
        // grupo por grupo
        foreach($userGroups as $userGroup) 
        {
            // se o usuário PERTENCE ao grupo
            if($userGroup->users->contains($user))
            {   
                // seta condição de remoção do grupo como verdadeira
                $remove = true;

                //verifica se existe algum CHECK no request
                if($request->group)
                    // lista cada um dos CHECKS
                    foreach($request->group as $checked) 
                        // se o id do CHECK for igual ao id do GRUPO (do foreach)
                        if($userGroup->id == $checked)
                            // usuário não será removido do grupo
                            $remove = false;

                        if($remove)
                    // remove usuário do grupo
                            $user->userGroups()->detach($userGroup);
                    }
            // se o usuário NÃO PERTENCE ao grupo
                    else
                    {
                // seta condição de adição no grupo como falsa
                        $add = false;

                // verifica se existe algum CHECK no request
                        if($request->group)
                    // lista cada um dos CHECKS
                            foreach($request->group as $checked) 
                        // se o id do CHECK for igual ao id do GRUPO (do foreach)
                                if($userGroup->id == $checked)
                            // usuário será adicionado do grupo
                                    $add = true;
                                if($add)
                    // adiciona usuário ao grupo
                                    $user->userGroups()->attach($userGroup);
                            }
                        }
                        $user->userTypes()->sync($request->usersType);
                        $user->save();

                        Session::flash('success', 'Usuário alterado com sucesso');
                        return redirect()->route('users');
                    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('success', 'Usuário deletado com sucesso');
        return redirect()->back();
    }
}
