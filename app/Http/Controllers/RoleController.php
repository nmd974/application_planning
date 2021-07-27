<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->paginate(5);
    
        return view('roles.index',compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('roles.create');
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
            'label' => 'required',
        ],
        [
            'required' => 'Le champ :attribute est requis'
        ]);
        $request['state'] = "disabled";
    
        Role::create($request->all());
     
        return redirect()->route('roles.index')
                        ->with('messageSuccess','Le role a bien été crée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
     public function show(Role $role)
    {
        
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
     public function edit(Role $role)
    {
        
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Role $role)
    {
        $request->validate([
            'label' => 'required',
            
        ]);
    
        $role->update($request->all());
    
        return redirect()->route('roles.index')
                        ->with('messageSuccess','Le role a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
     public function destroy(Role $role)
    {
        $role->delete();
    
        return redirect()->route('roles.index')
                        ->with('messageSuccess','Le role a bien été supprimé');
    }}