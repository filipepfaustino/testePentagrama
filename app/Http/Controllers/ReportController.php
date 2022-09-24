<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Builder;

class ReportController extends Controller
{
    public function index(Request $request) {
        $neighborhoods = Neighborhood::query();
        if ($request->filled('city_id')){
            $city_id = $request->input('city_id');
            $neighborhoods->where('city_id', $city_id);
        }

        if ($request->filled('foundation_date_inicial')) {
            $foundation_date_inicial = $request->input('foundation_date_inicial');
            $neighborhoods->whereHas('city', function (Builder $query) use($foundation_date_inicial){
                $query->where('foundation_date', '>=', $foundation_date_inicial);
            });
        }
        if ($request->filled('foundation_date_final')) {
            $foundation_date_final = $request->input('foundation_date_final');
            $neighborhoods->whereHas('city', function (Builder $query) use($foundation_date_final){
                $query->where('foundation_date', '<=', $foundation_date_final);
            });
        }
        if ($request->filled('neighborhood_name')){
            $neighborhood_name = $request->input('neighborhood_name');
            $neighborhoods->where('neighborhood_name', 'like', "%$neighborhood_name%");
        }

        $cities = City::all();
        $neighborhoods= $neighborhoods->get();

        return view('reports.index', compact('cities', 'neighborhoods'));
    }
}
