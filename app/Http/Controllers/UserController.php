<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        
        return view('users.index',compact('users'),['roles'=> $roles])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {        
        $roles = Role::all();
        return view('users.create', ['roles'=> $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'promotion' => 'required',
            'birthday' => 'required',
            'role_id' => 'required',
        ],

        [
            'required' => 'Le champ :attribute est requis!',
        ]);

        $request['state'] = true;
    
        User::create($request->all());
     
        return redirect()->route('users.index')
                        ->with('messageSuccess','L\'utilisateur a bien été crée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
     public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
     public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',compact('user'), ['roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, User $user)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'promotion' => 'required',
            'birthday' => 'required',
            'role_id' => 'required',
        ]);
    
        $user->update($request->all());
    
        return redirect()->route('users.index')
                        ->with('messageSuccess','L\'utilisateur a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
     public function destroy(User $user)
    {
        $user->delete();
    
        return redirect()->route('users.index')
                        ->with('messageSuccess','L\'utilisateur a bien été supprimé');
    }}