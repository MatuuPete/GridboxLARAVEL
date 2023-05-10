<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Charts\RescuedChart;
use App\Charts\AdoptedChart;
use App\Models\Animal;
class DashboardController extends Controller
{
    public function index(){

        return view('dashboard.index');
    }

    public function chartRescued($date){
        $dates = explode(",", $date);

        $from = $dates[0];
        $to = $dates[1];

        $animalRescued = Animal::selectRaw('COUNT(id) as rescued, MONTHNAME(date_rescued) as month')
            ->whereBetween('date_rescued', [$from, $to])
            ->groupBy('month')
            ->orderBy('date_rescued', 'asc')
            ->get();

         return response()->json($animalRescued);
    }

    public function chartAdopted($date){
        $dates = explode(",", $date);

        $from = $dates[0];
        $to = $dates[1];

         $animalAdopted = Animal::selectRaw('COUNT(id) as adopted, MONTHNAME(date_adopted) as month')
            ->whereBetween('date_adopted', [$from, $to])
            ->orderBy('date_adopted', 'asc')
            ->groupBy('month')
            ->get();

         return response()->json($animalAdopted);
    }

}