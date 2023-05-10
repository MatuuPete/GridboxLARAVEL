<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopter;

class AdopterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adopter.index');
    }

    public function getAdopterAll()
    {
        $adopters = Adopter::all();
        return response()->json($adopters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $adopter = Adopter::find($id);
        return response()->json($adopter);
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
        $adopter = Adopter::find($id);
        $adopter = $adopter->update($request->all());
        $adopter = Adopter::find($id);
        return response()->json($adopter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adopter = Adopter::findOrFail($id);
        $adopter->delete();
        return response()->json(["success" => "Adopter deleted successfully!", "data" => $adopter,"status" => 200]);
    }
}
