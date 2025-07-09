<?php

namespace App\Http\Controllers;

use App\Models\Constellations;
use App\Models\News;
use App\Models\Observatories;
use App\Models\Planets;

class CosmicExplorerController extends Controller
{
    public function home()
    {
        $data = [
            'planets' => Planets::get(),
            'news_bigbang_theory' => News::find(1),
            'news_earth_evolved' => News::find(2),
            'news_comet' => News::find(3),
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'observatories' => Observatories::orderBy('name', 'asc')->get()
        ];
        return view('user/home')->with($data);
    }
}
