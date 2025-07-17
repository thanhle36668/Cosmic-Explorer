<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Constellations;
use App\Models\Observatories;
use App\Models\Planets;
use App\Models\Post;
use App\Models\Discovery;

class CosmicExplorerController extends Controller
{

    // Controller Home
    public function home()
    {
        $data = [
            'planets' => Planets::get(),
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'observatories' => Observatories::orderBy('name', 'desc')->get(),
            'discovery' => Discovery::get()
        ];
        return view('user/home')->with($data);
    }

    // Controller Page News
    public function news()
    {
        $data = [
            'posts' => Post::paginate(4)
        ];
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
    public function pageDetailsNew($id)
    {
        $data = [
            'post_details' => Post::find($id)
        ];
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

    // Controller Page Details Discovery
    public function pageDetailsDiscovery($id)
    {
        $data = [
            'planets' => Planets::get(),
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'observatories' => Observatories::orderBy('name', 'desc')->get(),
            'discovery_details' => Discovery::find($id)
        ];
        return view('user/details-page-discovery')->with($data);
    }

    // Controller Page Collections Books
    public function pageCollectionsBooks()
    {
        $data = [
            'books' => Books::paginate(4)
        ];
        return view('user/collections-page-books')->with($data);
    }
}
