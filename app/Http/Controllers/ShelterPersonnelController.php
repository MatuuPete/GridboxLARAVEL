<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShelterPersonnel;
use Storage;

class ShelterPersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shelter_personnel.index');
    }

    public function getShelterPersonnelAll()
    {
        $shelter_personnels = ShelterPersonnel::all();
        return response()->json($shelter_personnels);
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
        $shelter_personnel = new ShelterPersonnel;
        $shelter_personnel->p_fname = $request->p_fname;
        $shelter_personnel->p_lname = $request->p_lname;
        $shelter_personnel->job_description = $request->job_description;
        $shelter_personnel->phone = $request->phone;
        $shelter_personnel->address = $request->address;

        if($request->hasFile('image'))
        {
        $files = $request->file('image');
        
        $shelter_personnel->image = 'storage/images/'.$files->getClientOriginalName();
        
        $data=array('status' => 'saved');
        Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        }
        $shelter_personnel->save();
        return response()->json(["success" => "Rescuer created successfully.","shelter_personnel" => $shelter_personnel,"status" => 200]);

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
        $shelter_personnel = ShelterPersonnel::find($id);
        return response()->json($shelter_personnel);
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
        $shelter_personnel = ShelterPersonnel::find($id);
        $shelter_personnel = $shelter_personnel->update($request->all());
        $shelter_personnel = ShelterPersonnel::find($id);
        return response()->json($shelter_personnel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shelter_personnel = ShelterPersonnel::findOrFail($id);
        $shelter_personnel->delete();
        return response()->json(["success" => "Shelter Personnel deleted successfully!", "data" => $shelter_personnel,"status" => 200]);
    }
}
