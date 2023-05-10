<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Rescuer;
use App\Models\DiseaseInjury;
use App\Models\ShelterPersonnel;
use Storage;
use DB;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rescuer = Rescuer::pluck('r_lname', 'id');
        $disease_injury = DiseaseInjury::pluck('dis_inj', 'id');
        $personnel = ShelterPersonnel::pluck('p_lname', 'id');
        return view('animal.index', compact('rescuer', 'disease_injury', 'personnel'));
    }

    public function getAnimalAll()
    {
        $animals = Animal::all();
        return response()->json($animals);
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
        if($request->hasFile('image'))
        {
            $litrato = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $litrato);
        }
        $animal = new Animal([
            'type' => $request->get('type'),
            'breed' => $request->get('breed'),
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'age' => $request->get('age'),
            'date_rescued' => $request->get('date_rescued'),
            'place_rescued' => $request->get('place_rescued'),
            'image' => 'storage/images/'.$litrato,
            'rescuer_id' => $request->get('rescuer_id'),
            'personnel_id' => $request->get('personnel_id'),
            'date_checked' => $request->get('date_checked')
        ]); 
        if (empty($request->input('disease_injury_id')))
        {
            $animal->status = 'Rehabilitated';
            $animal->save();
        }
        else
        {
            $animal->status = 'Treatment';
            $animal->save();
            foreach ($request->disease_injury_id as $disease_injury_id) {
            DB::table('animal_condition')->insert(
                ['disease_injury_id' => $disease_injury_id,
                'animal_id' => $animal->id]
            );
            }
        }
        return response()->json(["success" => "Animal created successfully.","animal" => $animal,"status" => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = \App\Models\Animal::find($id);
        return view('show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        return response()->json($animal);
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
        $animal = Animal::find($id);
        $animal = $animal->update($request->all());
        $animal = Animal::find($id);
        return response()->json($animal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('animal_condition')->where('animal_id', $id)->delete();
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return response()->json(["success" => "Animal deleted successfully!", "data" => $animal,"status" => 200]);
    }
}
