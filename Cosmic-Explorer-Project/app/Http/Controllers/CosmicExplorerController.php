<?php

namespace App\Http\Controllers;

use App\Models\Constellations;
use App\Models\News;
use App\Models\Observatories;
use App\Models\Planets;

class CosmicExplorerController extends Controller
{

    // Controller Home
    public function home()
    {
        $data = [
            'planets' => Planets::get(),
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'observatories' => Observatories::orderBy('name', 'desc')->get(),
            'news_bigbang_theory' => News::find(1),
            'news_earth_evolved' => News::find(2),
            'news_comet' => News::find(3),
        ];
        return view('user/home')->with($data);
    }

    // Controller Page Details Planet
    public function pageDetailsPlanet($id)
    {
        $data = [
            'planets' => Planets::get(),
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'observatories' => Observatories::orderBy('name', 'desc')->get(),
            'planet_details' => Planets::find($id)
        ];
        return view('user/details-page-planet')->with($data);
    }

    // Controller Page Details Constellation
    public function pageDetailsConstellation($id)
    {
        $data = [
            'planets' => Planets::get(),
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'observatories' => Observatories::orderBy('name', 'desc')->get(),
            'constellation_details' => Constellations::find($id)
        ];
        return view('user/details-page-constellation')->with($data);
    }

    // Controller Page Details Observatory
    public function pageDetailsObservatory($id)
    {
        $data = [
            'planets' => Planets::get(),
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'observatories' => Observatories::orderBy('name', 'desc')->get(),
            'observatory_details' => Observatories::find($id)
        ];
        return view('user/details-page-observatory')->with($data);
    }
}
