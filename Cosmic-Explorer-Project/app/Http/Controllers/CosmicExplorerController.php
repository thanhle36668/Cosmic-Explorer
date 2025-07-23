<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\About_services;
use App\Models\Books;
use App\Models\Constellations;
use App\Models\Discovery;
use App\Models\Introduction;
use App\Models\Observatories;
use App\Models\Planets;
use App\Models\Post;
use App\Models\Videos;

class CosmicExplorerController extends Controller
{

    // Controller Home
    public function home()
    {
        $data = [
            'introduction' => Introduction::get(),
            'planets' => Planets::get(),
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'observatories' => Observatories::orderBy('name', 'desc')->get(),
            'discovery' => Discovery::get(),
            'post' => Post::get(),
        ];
        return view('user/home')->with($data);
    }

    // Controller Page About
    public function about()
    {
        $data = [
            'about' => About::firstOrFail(),
            'services' => About_services::get()
        ];
        return view('user/about')->with($data);
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

    // Controller Page Collections Books
    public function pageCollectionsBooks()
    {
        $data = [
            'books' => Books::paginate(4)
        ];
        return view('user/collections-page-books')->with($data);
    }

    // Controller Page Collections Videos
    public function pageCollectionsVideos()
    {
        $data = [
            'videos' => Videos::paginate(4)
        ];
        return view('user/collections-page-videos')->with($data);
    }

    // Page Details
    // Controller Page Details New
    public function pageDetailsNew()
    {
        $data = [];
        return view('user/details-page-new')->with($data);
    }

    // Controller Page Details Planet
    public function pageDetailsPlanet($slug)
    {
        $data = [
            'planets' => Planets::get(),
            'planet_details' => Planets::where('slug', $slug)->firstOrFail()
        ];
        return view('user/details-page-planet')->with($data);
    }

    // Controller Page Details Constellation
    public function pageDetailsConstellation($slug)
    {
        $data = [
            'constellations' => Constellations::orderBy('name', 'asc')->get(),
            'constellation_details' => Constellations::where('slug', $slug)->firstOrFail()
        ];
        return view('user/details-page-constellation')->with($data);
    }

    // Controller Page Details Observatory
    public function pageDetailsObservatory($slug)
    {
        $data = [
            'observatories' => Observatories::orderBy('name', 'desc')->get(),
            'observatory_details' => Observatories::where('slug', $slug)->firstOrFail()
        ];
        return view('user/details-page-observatory')->with($data);
    }

    // Controller Page Details Discovery
    public function pageDetailsDiscovery($slug)
    {
        $data = [
            'planets' => Planets::get(),
            'discovery_details' => Discovery::where('slug', $slug)->firstOrFail()
        ];
        return view('user/details-page-discovery')->with($data);
    }

    // Controller Page Details Book
    public function pageDetailsBook($slug)
    {
        $data = [
            'books' => Books::get(),
            'book_details' => Books::where('slug', $slug)->firstOrFail()
        ];
        return view('user/details-page-book')->with($data);
    }
}
