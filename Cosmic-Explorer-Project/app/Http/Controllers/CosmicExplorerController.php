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
use Illuminate\Http\Request;

class CosmicExplorerController extends Controller
{

    // Controller Home
    public function home()
    {
        $data = [
            'introduction' => Introduction::get(),
            'planets' => Planets::orderBy('id', 'desc')->get(),
            'constellations' => Constellations::orderBy('id', 'desc')->get(),
            'observatories' => Observatories::orderBy('id', 'desc')->get(),
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
            'service' => About_services::firstOrFail()
        ];
        return view('user/about')->with($data);
    }

    // Controller Page Collections Planets
    public function pageCollectionsPlanets(Request $request)
    {
        $totalPlanetsCount = Planets::where('status', true)->count();

        $perPage = 4;

        $totalPages = ceil($totalPlanetsCount / $perPage);

        $currentPage = $request->input('page', 1);

        if ($totalPlanetsCount > 0 && $currentPage > $totalPages && $currentPage != 1) {
            return abort(404, 'Page Not Found');
        }

        $planets = Planets::where('status', true)->orderBy('id', 'desc')->paginate($perPage);


        $data = [
            'planets' => $planets
        ];
        return view('user/collections-page-planets')->with($data);
    }

    // Controller Page Collections Constellations
    public function pageCollectionsConstellations(Request $request)
    {
        $totalConstellationsCount = Constellations::where('status', true)->count();

        $perPage = 4;

        $totalPages = ceil($totalConstellationsCount / $perPage);

        $currentPage = $request->input('page', 1);

        if ($totalConstellationsCount > 0 && $currentPage > $totalPages && $currentPage != 1) {
            return abort(404, 'Page Not Found');
        }

        $constellations = Constellations::where('status', true)->orderBy('id', 'desc')->paginate($perPage);

        $data = [
            'constellations' => $constellations
        ];
        return view('user/collections-page-constellations')->with($data);
    }

    // Controller Page Collections Observatories
    public function pageCollectionsObservatories(Request $request)
    {
        $totalObservatoriesCount = Observatories::where('status', true)->count();

        $perPage = 4;

        $totalPages = ceil($totalObservatoriesCount / $perPage);

        $currentPage = $request->input('page', 1);

        if ($totalObservatoriesCount > 0 && $currentPage > $totalPages && $currentPage != 1) {
            return abort(404, 'Page Not Found');
        }

        $observatories = Observatories::where('status', true)->orderBy('id', 'desc')->paginate($perPage);

        $data = [
            'observatories' => $observatories
        ];
        return view('user/collections-page-observatories')->with($data);
    }

    // Controller Page Collections Books
    public function pageCollectionsBooks(Request $request)
    {
        $totalBooksCount = Books::where('status', true)->count();

        $perPage = 4;

        $totalPages = ceil($totalBooksCount / $perPage);

        $currentPage = $request->input('page', 1);

        if ($totalBooksCount > 0 && $currentPage > $totalPages && $currentPage != 1) {
            return abort(404, 'Page Not Found');
        }

        $books = Books::where('status', true)->orderBy('id', 'desc')->paginate($perPage);

        $data = [
            'books' => $books
        ];
        return view('user/collections-page-books')->with($data);
    }

    // Controller Page Collections Videos
    public function pageCollectionsVideos(Request $request)
    {
        $totalVideosCount = Videos::where('status', true)->count();

        $perPage = 4;

        $totalPages = ceil($totalVideosCount / $perPage);

        $currentPage = $request->input('page', 1);

        if ($totalVideosCount > 0 && $currentPage > $totalPages && $currentPage != 1) {
            return abort(404, 'Page Not Found');
        }

        $videos = Videos::where('status', true)->orderBy('id', 'desc')->paginate($perPage);

        $data = [
            'videos' => $videos
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
