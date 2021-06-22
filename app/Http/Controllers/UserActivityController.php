<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $useractivities = UserActivity::all();

    
        return view('useractivities.index',compact('useractivities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'label' => 'required|max:255',
            'day' => 'required',
        ]);
    
        $useractivities = UserActivity::create($validatedData);
    
        return redirect('/useractivities')->with('success', 'Association crée avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $useractivities = UserActivity::where(['activity_id' => $id])->get();
        $tableauUsers = [];
        $userActivity = Activity::where(['id' => $id])->get();
        foreach($useractivities as $useractivitie) {
            $valueTemp = User::where(['id' => $useractivitie->user_id])->get();
            $tableauUsers[] =  $valueTemp->first_name . $valueTemp->last_name;
        }
        return view('useractivities.show', ['useractivities' => $useractivities, 'tableauUsers' => $tableauUsers, 'userActivity' => $userActivity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(UserActivity $userActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserActivity $userActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserActivity $userActivity)
    {
        //
    }
}
