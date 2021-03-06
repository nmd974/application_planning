<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activities = Activity::where([
            ['label', '!=', Null],
            ['archived', '==', 'false'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('label', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("id", "desc")
        ->paginate();
        $users = User::where(['state' => true])->get();
        return view('activities.index', ['activities' => $activities, 'users' => $users]);
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
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required'
        ],
        [
            'required' => 'Le champ :attribute est requis'
        ]);

        $start = date("Y-m-d H:i:s", strtotime($request["start_date"] . " " . $request["start_time"] . ":00"));
        $end = date("Y-m-d H:i:s", strtotime($request["end_date"] . " " . $request["end_time"] . ":00"));

        $activity = new Activity();
        $activity->label = $request['label'];
        $activity->start = $start;
        $activity->end = $end;
        $activity->archived = false;

        if($activity->save()){
            return redirect()->route('activities.index')->with(['messageSuccess' => "Activit?? cr????e avec succ??s"]);
        }
        return redirect()->route('activities.create')->with(['messageError' => "Echec lors de la cr??ation de l'activit??"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $activity = Activity::find($id);
        return json_encode($activity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Search a value in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $this->validate($request, [
            'search_value' => 'required',
        ]);
        $activities = Activity::where('label', 'like', '%' . $request['search_value'] . '%')->get();
        return view('activities.search', ['activities' => $activities]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'label' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $start = date("Y-m-d H:i:s", strtotime($request["start_date"] . " " . $request["start_time"] . ":00"));
        $end = date("Y-m-d H:i:s", strtotime($request["end_date"] . " " . $request["end_time"] . ":00"));

        $activity = Activity::find($id);
        $activity->label = $request['label'];
        $activity->start = $start;
        $activity->end = $end;

        if($activity->update()){
            return redirect()->route('activities.index')->with(['messageSuccess' => "Activit?? cr????e avec succ??s"]);
        }
        return redirect()->route('activities.create')->with(['messageError' => "Echec lors de la cr??ation de l'activit??"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $activity = Activity::find($id);
        $activity->archived = true;

        if($activity->update()){
            return redirect()->route('activities.index')->with(['messageSuccess' => "Activit?? supprim??e avec succ??s"]);
        }
        return redirect()->route('activities.create')->with(['messageError' => "Echec lors de la suppression de l'activit??"]);
        
    }
}
