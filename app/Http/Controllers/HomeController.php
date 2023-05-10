<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Animal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getAdoptableAnimal()
    {
        $animals = DB::table('animals')->leftJoin('adopters', 'adopters.id', 'adopter_id')->select('animals.*')->where('status', 'Rehabilitated')->whereNull('adopter_id')->get();
        return response()->json($animals);
    }

    public function search($term=null)
    {
        if(empty($term))
        {
            $animals = DB::table('animals')->leftJoin('adopters', 'adopters.id', 'adopter_id')->select('animals.*')->where('status', 'Rehabilitated')->whereNull('adopter_id')->get();
        }
        else
        {
            $animals = Animal::orderBy('type','asc')
            ->leftJoin('adopters', 'adopters.id', 'adopter_id')
            ->select('animals.*')
            ->where('status', 'Rehabilitated')
            ->whereNull('adopter_id')
            ->where('breed', 'like', '%' .$term . '%')
            ->get();
        }
        return response()->json($animals);
    }
}
