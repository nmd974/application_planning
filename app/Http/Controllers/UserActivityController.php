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
        $this->validate($request, [
            'label' => 'required|max:255',
            'id' => 'required|integer',
            'day' => 'required|date',
            'users' => 'required'
        ]);
        
        $activity = new UserActivity();
        $activity->label = $request['label'];
        $activity->day = date("Y-m-d", strtotime($request["day"]));
        $activity->archived = false;
        $activity->user_id = $request['users'];
        $activity->activity_id = $request['id'];

        if($activity->save()){
            return redirect()->route('useractivities.show', $request['id'])->with(['messageSuccess' => "Activité créée avec succès"]);
        }
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
        $users = User::all();
        foreach($useractivities as $useractivitie) {
            $valueTemp = User::find($useractivitie->user_id);
            $tableauUsers[] =  $valueTemp->first_name . $valueTemp->last_name;
        }
        return view('useractivities.edit', ['useractivities' => $useractivities, 'tableauUsers' => $tableauUsers, 'userActivity' => $userActivity, 'users' => $users]);
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
        $useractivities = UserActivity::find($id);
        $useractivities->archived = true;

        if($useractivities->update()){
            return redirect()->route('useractivities.index')->with(['messageSuccess' => "Association supprimée avec succès"]);
        }
        return redirect()->route('useractivities.create')->with(['messageError' => "Echec lors de la suppression de l'association"]);
    }
}
