<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $users = User::latest()->paginate(5);
    
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('users.create');
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
        ]);
        $request['state'] = "disabled";
    
        User::create($request->all());
     
        return redirect()->route('users.index')
                        ->with('success','L\'utilisateur à bien été crée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
     public function show(User $user)
    {
        
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
     public function edit(User $user)
    {
        
        return view('users.edit',compact('user'));
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
                        ->with('success','L\'utilisateur à bien été modifié');
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
                        ->with('success','L\'utilisateur à bien été supprimé');
    }}