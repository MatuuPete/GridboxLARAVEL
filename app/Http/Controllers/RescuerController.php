<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescuer;
use Storage;

class RescuerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rescuer.index');
    }

    public function getRescuerAll()
    {
        $rescuers = Rescuer::all();
        return response()->json($rescuers);
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
        // parse_str($request->getContent(),$data);
        // $rescuer = Rescuer::create($data);
        // Log::info($rescuer);
        // return response()->json($rescuer);
        $rescuer = new Rescuer;
        $rescuer->r_fname = $request->r_fname;
        $rescuer->r_lname = $request->r_lname;
        $rescuer->phone = $request->phone;
        $rescuer->address = $request->address;

        if($request->hasFile('image'))
        {
        $files = $request->file('image');
        
        $rescuer->image = 'storage/images/'.$files->getClientOriginalName();
        
        $data=array('status' => 'saved');
        Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        }
        $rescuer->save();
        return response()->json(["success" => "Rescuer created successfully.","rescuer" => $rescuer,"status" => 200]);
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
        $rescuer = Rescuer::find($id);
        return response()->json($rescuer);
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
        $rescuer = Rescuer::find($id);
        $rescuer = $rescuer->update($request->all());
        $rescuer = Rescuer::find($id);
        return response()->json($rescuer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rescuer = Rescuer::findOrFail($id);
        $rescuer->delete();
        return response()->json(["success" => "Rescuer deleted successfully!", "data" => $rescuer,"status" => 200]);
    }
}
