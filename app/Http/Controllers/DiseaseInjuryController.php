<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiseaseInjury;
use Illuminate\Support\Facades\Log;

class DiseaseInjuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('disease_injury.index');
    }

    public function getDiseaseInjuryAll()
    {
        $disease_injuries = DiseaseInjury::all();
        return response()->json($disease_injuries);
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
        parse_str($request->getContent(),$data);
        $disease_injury = DiseaseInjury::create($data);
        Log::info($disease_injury);
        return response()->json($disease_injury);
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
        $disease_injury = DiseaseInjury::find($id);
        return response()->json($disease_injury);
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
        $disease_injury = DiseaseInjury::find($id);
        $disease_injury = $disease_injury->update($request->all());
        $disease_injury = DiseaseInjury::find($id);
        return response()->json($disease_injury);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disease_injury = DiseaseInjury::findOrFail($id);
        $disease_injury->delete();
        return response()->json(["success" => "Disease/Injury deleted successfully!", "data" => $disease_injury,"status" => 200]);
    }
}
