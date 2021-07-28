<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::latest()->paginate(5);
    
        return view('promotion.index',compact('promotions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('promotion.create');
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
            
        ]);
        $request['state'] = "disabled";
    
        Promotion::create($request->all());
     
        return redirect()->route('promotion.index')
                        ->with('messageSuccess','La promotion a bien été crée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
     public function show(Promotion $promotion)
    {
        
        return view('promotion.show',compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
     public function edit(Promotion $promotion)
    {
        
        return view('promotion.edit',compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'label' => 'required',
            
        ]);
    
        $promotion->update($request->all());
    
        return redirect()->route('promotion.index')
                        ->with('messageSuccess','La promotion a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
     public function destroy(Promotion $promotion)
    {
        $promotion->delete();
    
        return redirect()->route('promotion.index')
                        ->with('messageSuccess','La Promotion a bien été supprimé');
    }}