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

    public function news()
    {
        $data = [];
        return view('user/news')->with($data);
    }

    // Controller Page Collections Planets
    public function pageCollectionsPlanets()
    {
        $data = [
            'planets' => Planets::paginate(4)
        ];
        return view('user/collections-page-planets')->with($data);
    }

    // Controller Page Collections Constellations
    public function pageCollectionsConstellations()
    {
        $data = [
            'constellations' => Constellations::paginate(4)
        ];
        return view('user/collections-page-constellations')->with($data);
    }

    // Controller Page Collections Observatories
    public function pageCollectionsObservatories()
    {
        $data = [
            'observatories' => Observatories::paginate(4)
        ];
        return view('user/collections-page-observatories')->with($data);
    }

    // Controller Page Details New
    public function pageDetailsNew()
    {
        $data = [];
        return view('user/details-page-new')->with($data);
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

    // Controller Page Details News
    public function pageDetailsNews($id)
    {
        $data = [
            'planets' => Planets::get(),
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'observatories' => Observatories::orderBy('name', 'desc')->get(),
            'news' => News::get(),
            'news_details' => News::find($id)
        ];
        return view('user/details-page-news')->with($data);
    }
}
