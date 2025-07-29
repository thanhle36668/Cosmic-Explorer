<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\About_services;
use App\Models\Books;
use App\Models\Comment;
use App\Models\Constellations;
use App\Models\Discovery;
use App\Models\Introduction;
use App\Models\Observatories;
use App\Models\Planets;
use App\Models\Post;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CustomizationController extends Controller
{

    // Dashboard
    public function dashboard()
    {
        $data = [
            'total_planet' => Planets::count(),
            'total_constellation' => Constellations::count(),
            'total_observatory' => Observatories::count(),
            'total_post' => Post::count(),
            'total_comment' => Comment::count(),
            'total_post_discovery' => Discovery::count()
        ];
        return view('admin/dashboard')->with($data);
    }

    // Customization Introduction
    public function introduction()
    {
        $data = [
            'information' => Introduction::firstOrFail()
        ];

        return view('admin/customization/introduction/introduction')->with($data);
    }

    public function updatedIntroduction(Request $request)
    {
        $validationRules = [
            'website_name' => 'required|string|max:255',
            'short_introduction' => 'required|string',
            'short_introduction_2' => 'nullable|string',
            'company_description' => 'required|string',
        ];

        $validationRules['photo'] = 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp';

        for ($i = 2; $i <= 8; $i++) {
            $validationRules['photo_' . $i] = 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp';
        }

        $request->validate($validationRules);

        $introduction = Introduction::find($request->id);

        $data_updated = [
            'website_name' => $request->website_name,
            'short_introduction' => $request->short_introduction,
            'short_introduction_2' => $request->short_introduction_2,
            'company_description' => $request->company_description
        ];

        $destinationPath = public_path('images/introduction');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $photoArray = ['photo'];
        for ($i = 2; $i <= 8; $i++) {
            $photoArray[] = 'photo_' . $i;
        }

        foreach ($photoArray as $item) {
            $deleteCheckboxName = 'delete_' . $item;
            if ($request->hasFile($item)) {
                $imageFile = $request->file($item);

                if ($introduction->$item) {
                    $oldImagePathFromDb = $introduction->$item;
                    $oldImagePath = public_path($oldImagePathFromDb);

                    if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_updated[$item] = 'images/introduction/' . $imageName;
            } elseif ($request->has($deleteCheckboxName) && $request->$deleteCheckboxName == 1) {

                $oldImagePathFromDb = $introduction->$item;
                $oldImagePath = public_path($oldImagePathFromDb);

                if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $data_updated[$item] = null;
            }
        }
        $introduction->update($data_updated);

        return redirect()->route('admin.customization-introduction')->with('success-update-introduction', 'You have successfully changed!');
    }

    // Customization About
    public function about()
    {
        $data = [
            'about' => About::firstOrFail(),
            'about_services' => About_services::firstOrFail(),
        ];

        return view('admin/customization/about/about')->with($data);
    }

    public function updatedAbout(Request $request)
    {
        $validationRules = [
            'title' => 'required|string|max:255',
            'description_1' => 'required|string',
            'description_2' => 'required|string',
            'link' => 'nullable|string|max:300',
            'link_2' => 'nullable|string|max:300',
            'link_3' => 'nullable|string|max:300',
            'link_4' => 'nullable|string|max:300',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'aboutErrors')
                ->withInput();
        }

        $about = About::find($request->id);

        $data_updated = [
            'title' => $request->title,
            'description_1' => $request->description_1,
            'description_2' => $request->description_2,
            'link' => $request->link,
            'link_2' => $request->link_2,
            'link_3' => $request->link_3,
            'link_4' => $request->link_4
        ];

        $destinationPath = public_path('images/about');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if ($request->hasFile('photo')) {
            $imageFile = $request->file('photo');

            $oldImagePathFromDb = $about->photo;

            if ($oldImagePathFromDb && File::exists(public_path($oldImagePathFromDb))) {
                File::delete(public_path($oldImagePathFromDb));
            }

            $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

            $imageFile->move($destinationPath, $imageName);

            $data_updated['photo'] = 'images/about/' . $imageName;
        } elseif ($request->has('delete_photo') && $request->delete_photo == 1) {
            $oldImagePathFromDb = $about->photo;
            $oldImagePath = public_path($oldImagePathFromDb);

            if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $data_updated['photo'] = null;
        }

        $about->update($data_updated);

        return redirect()->route('admin.customization-about')->with('success-updated-about', 'You have successfully changed!');
    }

    public function updatedAboutServices(Request $request)
    {
        $validationRules = [
            'name' => 'required|string|max:250',
            'name_2' => 'required|string|max:250',
            'name_3' => 'required|string|max:250',
            'description' => 'required|string',
            'description_2' => 'required|string',
            'description_3' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_3' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'aboutServices')
                ->withInput();
        }

        $service = About_services::firstOrFail();

        $data_updated = [
            'name' => $request->name,
            'name_2' => $request->name_2,
            'name_3' => $request->name_3,
            'description' => $request->description,
            'description_2' => $request->description_2,
            'description_3' => $request->description_3
        ];

        $destinationPath = public_path('images/about');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $photoArray = ['photo', 'photo_2', 'photo_3'];
        foreach ($photoArray as $item) {
            $deleteCheckboxName = 'delete_' . $item;
            if ($request->hasFile($item)) {
                $imageFile = $request->file($item);

                $oldImagePathFromDb = $service->$item;
                $oldImagePath = public_path($oldImagePathFromDb);

                if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);
                $data_updated[$item] = 'images/about/' . $imageName;
            } elseif ($request->has($deleteCheckboxName) && $request->$deleteCheckboxName == 1) {
                $oldImagePathFromDb = $service->$item;
                $oldImagePath = public_path($oldImagePathFromDb);

                if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $data_updated[$item] = null;
            }
        }

        $service->update($data_updated);

        return redirect()->route('admin.customization-about')->with('success-updated-about-services', 'You have successfully changed!');
    }

    // Customization Discovery
    public function discovery()
    {
        $data = [
            'discovery' => Discovery::orderBy('id', 'desc')->paginate(4)
        ];

        return view('admin/customization/discovery/discovery')->with($data);
    }

    public function createDiscovery()
    {
        return view('admin/customization/discovery/create-discovery');
    }

    public function savePostDiscovery(Request $request)
    {
        $processedSlug = Str::slug($request->slug);
        $dataForValidation = $request->all();
        $dataForValidation['slug'] = $processedSlug;

        $validationRules = [
            'title' => 'required|string|max:255|unique:discovery,title',
            'slug' => 'required|string|max:255|unique:discovery,slug',
            'author' => 'required|string|max:255',
            'description_short' => 'required|string',
            'title_details' => 'required|string',
            'description_details' => 'required|string',
            'content_1' => 'required|string',
            'content_2' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $validator = Validator::make($dataForValidation, $validationRules);
        $validator->validate();

        try {
            $data_create = [
                'title' => $request->title,
                'slug' => $processedSlug,
                'status' => 0,
                'author' => $request->author,
                'description_short' => $request->description_short,
                'title_details' => $request->title_details,
                'description_details' => $request->description_details,
                'content_1' => $request->content_1,
                'content_2' => $request->content_2,
            ];

            $destinationPath = public_path('images/discovery');

            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            };

            $photoArray = ['photo', 'photo_2'];
            foreach ($photoArray as $item) {
                if ($request->hasFile($item)) {
                    $imageFile = $request->file($item);

                    $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                    $imageFile->move($destinationPath, $imageName);

                    $data_create[$item] = 'images/discovery/' . $imageName;
                }
            }

            Discovery::create($data_create);

            return redirect()->route('admin.customization-discovery')->with('success-create-discovery', 'You have successfully created a post.');
        } catch (Exception $e) {
            return redirect()->back()->with('error-create-discovery', 'Failed to create post due to an internal error. Please try again.');
        }
    }

    public function deleteDiscovery($id)
    {
        $post = Discovery::find($id);

        $photoArray = ['photo'];
        for ($i = 2; $i <= 8; $i++) {
            $photoArray[] = 'photo_' . $i;
        }

        foreach ($photoArray as $item) {
            if ($post->$item) {
                $fullPath = public_path($post->$item);

                if (File::exists($fullPath)) {
                    File::delete($fullPath);
                }
            }
        }

        $post->delete();

        return redirect()->route('admin.customization-discovery')->with('success-delete-discovery', 'You have deleted successfully.');
    }

    public function searchDiscovery(Request $request)
    {
        $data = [
            'search_discovery' => Discovery::Where('title', 'LIKE', '%' . $request->search_title . '%')->get()
        ];

        return view('admin/customization/discovery/search-discovery')->with($data);
    }

    public function editDiscovery($slug)
    {
        $data = [
            'post' => Discovery::where('slug', $slug)->firstOrFail()
        ];

        return view('admin/customization/discovery/details-discovery')->with($data);
    }

    public function updatedDiscovery(Request $request)
    {
        $validationRules = [
            'title' => 'string|max:255|unique:discovery,title,' . $request->id,
            'slug' => 'string|max:255|unique:discovery,slug,' . $request->id,
            'status' => 'required|boolean',
            'author' => 'required|string|max:255',
            'description_short' => 'required|string',
            'title_details' => 'required|string',
            'description_details' => 'required|string',
            'content_1' => 'required|string',
            'content_2' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $request->validate($validationRules);

        $post = Discovery::find($request->id);

        $data_updated = [
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'author' => $request->author,
            'status' => $request->status,
            'description_short' => $request->description_short,
            'title_details' => $request->title_details,
            'description_details' => $request->description_details,
            'content_1' => $request->content_1,
            'content_2' => $request->content_2,
        ];

        $destinationPath = public_path('images/discovery');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $photoArray = ['photo', 'photo_2'];

        foreach ($photoArray as $item) {
            $deleteCheckboxName = 'delete_' . $item;
            if ($request->hasFile($item)) {
                $imageFile = $request->file($item);

                $oldImagePathFromDb = $post->$item;

                if ($oldImagePathFromDb && File::exists(public_path($oldImagePathFromDb))) {
                    File::delete(public_path($oldImagePathFromDb));
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_updated[$item] = 'images/discovery/' . $imageName;
            } elseif ($request->has($deleteCheckboxName) && $request->$deleteCheckboxName == 1) {
                $oldImagePathFromDb = $post->$item;
                $oldImagePath = public_path($oldImagePathFromDb);

                if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $data_updated[$item] = null;
            }
        }

        $post->update($data_updated);

        return redirect()->route('admin.edit-discovery', $post->slug)->with('success-update-discovery', 'You have successfully changed!');
    }

    // Customization Planets
    public function planets()
    {
        $data = [
            'planets' => Planets::orderBy('id', 'desc')->paginate(4)
        ];
        return view('admin/customization/planets/planets')->with($data);
    }

    public function createPlanet()
    {
        return view('admin/customization/planets/create-planet');
    }

    public function savePlanet(Request $request)
    {
        $processedSlug = Str::slug($request->slug);
        $dataForValidation = $request->all();
        $dataForValidation['slug'] = $processedSlug;

        $validationRules = [
            'name' => 'required|string|max:100|unique:planets,name',
            'slug' => 'required|string|max:255|unique:planets,slug',
            'title_short' => 'required|string',
            'brief_intro_composition' => 'required|string',
            'discovery_date' => 'required|string|max:250',
            'diameter_km' => 'required|string|max:250',
            'avg_distance_to_earth_km' => 'required|string|max:250',
            'avg_distance_to_sun_km' => 'required|string|max:250',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_3' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_4' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_5' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $validator = Validator::make($dataForValidation, $validationRules);
        $validator->validate();

        try {
            $data_create = [
                'name' => $request->name,
                'slug' => $processedSlug,
                'title_short' => $request->title_short,
                'status' => 0,
                'discovery_date' => $request->discovery_date,
                'diameter_km' => $request->diameter_km,
                'avg_distance_to_earth_km' => $request->avg_distance_to_earth_km,
                'avg_distance_to_sun_km' => $request->avg_distance_to_sun_km,
                'brief_intro_composition' => $request->brief_intro_composition,
            ];

            $destinationPath = public_path('images/planets');

            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $photoArray = ['photo', 'photo_2', 'photo_3', 'photo_4', 'photo_5'];

            foreach ($photoArray as $item) {
                if ($request->hasFile($item)) {
                    $imageFile = $request->file($item);

                    $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                    $imageFile->move($destinationPath, $imageName);

                    $data_create[$item] = 'images/planets/' . $imageName;
                }
            }

            Planets::create($data_create);

            return redirect()->route('admin.customization-planets')->with('success-create-planet', 'You have successfully created a planet.');
        } catch (Exception $e) {
            return redirect()->back()->with('error-create-planet', 'Failed to create planet due to an internal error. Please try again!!!');
        }
    }

    public function deletePlanet($id)
    {
        $planet = Planets::find($id);

        $photoArray = ['photo'];
        for ($i = 2; $i <= 5; $i++) {
            $photoArray[] = 'photo_' . $i;
        }

        foreach ($photoArray as $item) {
            if ($planet->$item) {
                $fullPath = public_path($planet->$item);
                if (File::exists($fullPath)) {
                    File::delete($fullPath);
                }
            }
        }

        $planet->delete();

        return redirect()->route('admin.customization-planets')->with('success-delete-planet', 'You have deleted successfully.');
    }

    public function editPlanet($slug)
    {
        $data = [
            'planet' => Planets::where('slug', $slug)->firstOrFail()
        ];

        return view('admin/customization/planets/details-planet')->with($data);
    }

    public function updatedPlanet(Request $request)
    {
        $validationRules = [
            'name' => 'string|max:100|unique:planets,name,' . $request->id,
            'slug' => 'string|max:255|unique:planets,slug,' . $request->id,
            'status' => 'required|boolean',
            'title_short' => 'required|string|',
            'brief_intro_composition' => 'required|string',
            'discovery_date' => 'required|max:250|string',
            'diameter_km' => 'required|max:250|string',
            'avg_distance_to_earth_km' => 'required|max:250|string',
            'avg_distance_to_sun_km' => 'required|max:250|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_3' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_4' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_5' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $request->validate($validationRules);

        $planet = Planets::find($request->id);

        $data_updated = [
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'status' => $request->status,
            'title_short' => $request->title_short,
            'brief_intro_composition' => $request->brief_intro_composition,
            'discovery_date' => $request->discovery_date,
            'diameter_km' => $request->diameter_km,
            'avg_distance_to_earth_km' => $request->avg_distance_to_earth_km,
            'avg_distance_to_sun_km' => $request->avg_distance_to_sun_km,
        ];

        $destinationPath = public_path('images/planets');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $photoArray = ['photo'];
        for ($i = 2; $i <= 5; $i++) {
            $photoArray[] = 'photo_' . $i;
        }

        foreach ($photoArray as $item) {
            $deleteCheckboxName = 'delete_' . $item;
            if ($request->hasFile($item)) {
                $imageFile = $request->file($item);

                $oldImagePathFromDb = $planet->$item;
                $oldImagePath = public_path($oldImagePathFromDb);
                if ($oldImagePathFromDb && $oldImagePath) {
                    File::delete($oldImagePath);
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_updated[$item] = 'images/planets/' . $imageName;
            } elseif ($request->has($deleteCheckboxName) && $request->$deleteCheckboxName == 1) {
                $oldImagePathFromDb = $planet->$item;
                $oldImagePath = public_path($oldImagePathFromDb);

                if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $data_updated[$item] = null;
            }
        }

        $planet->update($data_updated);

        return redirect()->route('admin.edit-planet', $planet->slug)->with('success-update-planet', 'You have successfully changed!');
    }

    public function searchPlanet(Request $request)
    {
        $data = [
            'search_planet' => Planets::where('slug', 'LIKE', '%' . $request->search_name . '%')->get()
        ];

        return view('admin/customization/planets/search-planet')->with($data);
    }

    // Customization Constellations
    public function constellations()
    {
        $data = [
            'constellations' => Constellations::orderBy('id', 'desc')->paginate(4)
        ];

        return view('admin/customization/constellations/constellations')->with($data);
    }

    public function createConstellation()
    {
        return view('admin/customization/constellations/create-constellation');
    }

    public function saveConstellation(Request $request)
    {
        $processedSlug = Str::slug($request->slug);
        $dataForValidation = $request->all();
        $dataForValidation['slug'] = $processedSlug;

        $validationRules = [
            'name' => 'required|string|max:255|unique:constellations,name',
            'slug' => 'required|string|max:255|unique:constellations,slug',
            'title' => 'required|string|max:500',
            'identification' => 'required|string',
            'main_stars' => 'required|string',
            'notable_features' => 'required|string',
            'myths_meaning' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_3' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_4' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $validator = Validator::make($dataForValidation, $validationRules);
        $validator->validate();

        try {
            $data_create = [
                'name' => $request->name,
                'slug' => $processedSlug,
                'title' => $request->title,
                'status' => 0,
                'identification' => $request->identification,
                'main_stars' => $request->main_stars,
                'notable_features' => $request->notable_features,
                'myths_meaning' => $request->myths_meaning
            ];

            $destinationPath = public_path('images/constellations');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $photoArray = ['photo'];
            for ($i = 2; $i <= 4; $i++) {
                $photoArray[] = 'photo_' . $i;
            }

            foreach ($photoArray as $item) {
                if ($request->hasFile($item)) {
                    $imageFile = $request->file($item);

                    $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                    $imageFile->move($destinationPath, $imageName);

                    $data_create[$item] = 'images/constellations/' . $imageName;
                }
            }

            Constellations::create($data_create);

            return redirect()->route('admin.customization-constellations')->with('success-create-constellation', 'You have successfully created a constellation.');
        } catch (Exception $e) {
            return redirect()->back()->with('error-create-constellation', 'Failed to create constellation due to an internal error. Please try again!!!');
        }
    }

    public function editConstellation($slug)
    {
        $data = [
            'constellation' => Constellations::where('slug', $slug)->firstOrFail()
        ];

        return view('admin/customization/constellations/details-constellation')->with($data);
    }

    public function updatedConstellation(Request $request)
    {
        $validationRules = [
            'name' => 'string|max:255|unique:constellations,name,' . $request->id,
            'slug' => 'string|max:255|unique:constellations,slug,' . $request->id,
            'status' => 'required|boolean',
            'title' => 'required|string|max:500',
            'identification' => 'required|string',
            'main_stars' => 'required|string',
            'notable_features' => 'required|string',
            'myths_meaning' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_3' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_4' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $request->validate($validationRules);

        $constellation = Constellations::find($request->id);

        $data_updated = [
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'title' => $request->title,
            'identification' => $request->identification,
            'main_stars' => $request->main_stars,
            'notable_features' => $request->notable_features,
            'myths_meaning' => $request->myths_meaning
        ];

        $destinationPath = public_path('images/constellations');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $photoArray = ['photo'];
        for ($i = 2; $i <= 4; $i++) {
            $photoArray[] = 'photo_' . $i;
        }

        foreach ($photoArray as $item) {
            $deleteCheckboxName = 'delete_' . $item;
            if ($request->hasFile($item)) {
                $imageFile = $request->file($item);

                $oldImagePathFromDb = $constellation->$item;
                $oldImagePath = public_path($oldImagePathFromDb);
                if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_updated[$item] = 'images/constellations/' . $imageName;
            } elseif ($request->has($deleteCheckboxName) && $request->$deleteCheckboxName == 1) {
                $oldImagePathFromDb = $constellation->$item;
                $oldImagePath = public_path($oldImagePathFromDb);

                if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $data_updated[$item] = null;
            }
        }

        $constellation->update($data_updated);
        return redirect()->route('admin.edit-constellation', $constellation->slug)->with('success-update-constellation', 'You have successfully changed!');
    }

    public function deleteConstellation($id)
    {
        $constellation = Constellations::find($id);

        $photoArray = ['photo'];
        for ($i = 2; $i <= 4; $i++) {
            $photoArray[] = 'photo_' . $i;
        }

        foreach ($photoArray as $item) {
            if ($constellation->$item) {
                $fullPath = public_path($constellation->$item);

                if (File::extension($fullPath)) {
                    File::delete($fullPath);
                }
            }
        }

        $constellation->delete();
        return redirect()->route('admin.customization-constellations')->with('success-delete-constellation', 'You have deleted successfully.');
    }

    public function searchConstellation(Request $request)
    {
        $data = [
            'search_constellation' => Constellations::where('name', 'LIKE', '%' . $request->search_name . '%')->get()
        ];

        return view('admin/customization/constellations/search-constellation')->with($data);
    }

    // Customization Observatories
    public function observatories()
    {
        $data = [
            'observatories' => Observatories::orderBy('id', 'desc')->paginate(4)
        ];

        return view('admin/customization/observatories/observatories')->with($data);
    }

    public function createObservatory()
    {
        return view('admin/customization/observatories/create-observatory');
    }

    public function saveObservatory(Request $request)
    {
        $processedSlug = Str::slug($request->slug);
        $dataForValidation = $request->all();
        $dataForValidation['slug'] = $processedSlug;

        $validationRules = [
            'name' => 'required|string|max:255|unique:observatories,name',
            'slug' => 'required|string|max:255|unique:observatories,slug',
            'location' => 'required|string|max:255',
            'altitude_meters' => 'required|string|max:255',
            'established_year' => 'required|string|max:255',
            'managing_organization' => 'required|string|max:255',
            'main_instruments' => 'required|string',
            'primary_research_areas' => 'required|string',
            'public_access_info' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_3' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_4' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $validator = Validator::make($dataForValidation, $validationRules);
        $validator->validate();

        try {
            $data_create = [
                'name' => $request->name,
                'slug' => $processedSlug,
                'status' => 0,
                'location' => $request->location,
                'altitude_meters' => $request->altitude_meters,
                'established_year' => $request->established_year,
                'managing_organization' => $request->managing_organization,
                'main_instruments' => $request->main_instruments,
                'primary_research_areas' => $request->primary_research_areas,
                'public_access_info' => $request->public_access_info,
            ];

            $destinationPath = public_path('images/observatories');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $photoArray = ['photo'];
            for ($i = 2; $i <= 4; $i++) {
                $photoArray[] = 'photo_' . $i;
            }

            foreach ($photoArray as $item) {
                if ($request->hasFile($item)) {
                    $imageFile = $request->file($item);

                    $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                    $imageFile->move($destinationPath, $imageName);

                    $data_create[$item] = 'images/observatories/' . $imageName;
                }
            }

            Observatories::create($data_create);

            return redirect()->route('admin.customization-observatories')->with('success-create-observatory', 'You have successfully created a observatory.');
        } catch (Exception $e) {
            return redirect()->back()->with('error-create-observatory', 'Failed to create constellation due to an internal error. Please try again!!!');
        }
    }

    public function editObservatory($slug)
    {
        $data = [
            'observatory' => Observatories::where('slug', $slug)->firstOrFail()
        ];

        return view('admin/customization/observatories/details-observatory')->with($data);
    }

    public function updatedObservatory(Request $request)
    {
        $validationRules = [
            'name' => 'string|max:255|unique:observatories,name,' . $request->id,
            'slug' => 'string|max:255|unique:observatories,slug,' . $request->id,
            'status' => 'required|boolean',
            'location' => 'required|string|max:255',
            'altitude_meters' => 'required|string|max:255',
            'established_year' => 'required|string|max:255',
            'managing_organization' => 'required|string|max:255',
            'main_instruments' => 'required|string',
            'primary_research_areas' => 'required|string',
            'public_access_info' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_3' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_4' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $request->validate($validationRules);
        $observatory = Observatories::find($request->id);

        $data_updated = [
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'location' => $request->location,
            'altitude_meters' => $request->altitude_meters,
            'established_year' => $request->established_year,
            'managing_organization' => $request->managing_organization,
            'main_instruments' => $request->main_instruments,
            'primary_research_areas' => $request->primary_research_areas,
            'public_access_info' => $request->public_access_info
        ];

        $destinationPath = public_path('images/observatories');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $photoArray = ['photo'];
        for ($i = 2; $i <= 4; $i++) {
            $photoArray[] = 'photo_' . $i;
        }

        foreach ($photoArray as $item) {
            $deleteCheckboxName = 'delete_' . $item;
            if ($request->hasFile($item)) {
                $imageFile = $request->file($item);

                $oldImagePathFromDb = $observatory->$item;
                $oldImagePath = public_path($oldImagePathFromDb);
                if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_updated[$item] = 'images/observatories/' . $imageName;
            } elseif ($request->has($deleteCheckboxName) && $request->$deleteCheckboxName == 1) {
                $oldImagePathFromDb = $observatory->$item;
                $oldImagePath = public_path($oldImagePathFromDb);

                if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $data_updated[$item] = null;
            }
        }
        $observatory->update($data_updated);
        return redirect()->route('admin.edit-observatory', $observatory->slug)->with('success-update-observatory', 'You have successfully changed!');
    }

    public function deleteObservatory($id)
    {
        $observatory = Observatories::find($id);

        $photoArray = ['photo'];
        for ($i = 2; $i <= 4; $i++) {
            $photoArray[] = 'photo_' . $i;
        }

        foreach ($photoArray as $item) {
            if ($observatory->$item) {
                $fullPath = public_path($observatory->$item);

                if (File::exists($fullPath)) {
                    File::delete($fullPath);
                }
            }
        }

        $observatory->delete();
        return redirect()->route('admin.customization-observatories')->with('success-delete-observatory', 'You have deleted successfully.');
    }

    public function searchObservatory(Request $request)
    {
        $data = [
            'search_observatory' => Observatories::where('name', 'LIKE', '%' . $request->search_name . '%')->get()
        ];

        return view('admin/customization/observatories/search-observatory')->with($data);
    }

    // Customization Books
    public function books()
    {
        $data = [
            'books' => Books::orderBy('id', 'desc')->paginate(4)
        ];

        return view('admin/customization/books/books')->with($data);
    }

    public function createBook()
    {
        return view('admin/customization/books/create-book');
    }

    public function saveBook(Request $request)
    {
        $processedSlug = Str::slug($request->slug);
        $dataForValidation = $request->all();
        $dataForValidation['slug'] = $processedSlug;

        $validationRules = [
            'name_book' => 'required|string|max:255|unique:books,name_book',
            'slug' => 'required|string|max:255|unique:books,slug',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'main_title' => 'required|string',
            'main_content' => 'required|string',
            'main_content_1' => 'required|string',
            'main_content_2' => 'required|string',
            'link_amazon' => 'nullable|string',
            'photo_book' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $validator = Validator::make($dataForValidation, $validationRules);
        $validator->validate();

        try {
            $data_create = [
                'name_book' => $request->name_book,
                'slug' => $request->slug,
                'status' => 0,
                'author' => $request->author,
                'publication_year' => $request->publication_year,
                'genre' => $request->genre,
                'description' => $request->description,
                'main_title' => $request->main_title,
                'main_content' => $request->main_content,
                'main_content_1' => $request->main_content_1,
                'main_content_2' => $request->main_content_2,
                'link_amazon' => $request->link_amazon
            ];

            $destinationPath = public_path('images/books');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            if ($request->hasFile('photo_book')) {
                $imageFile = $request->file('photo');

                $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_create['photo_book'] = 'images/books/' . $imageName;
            }

            Books::create($data_create);

            return redirect()->route('admin.customization-books')->with('success-create-book', 'You have successfully created a book.');
        } catch (Exception $e) {
            return redirect()->back()->with('error-create-book', 'Failed to create book due to an internal error. Please try again!!!');
        }
    }

    public function editBook($slug)
    {
        $data = [
            'book' => Books::where('slug', $slug)->firstOrFail()
        ];

        return view('admin/customization/books/details-book')->with($data);
    }

    public function updatedBook(Request $request)
    {
        $validationRules = [
            'name_book' => 'required|string|max:255|unique:books,name_book,' . $request->id,
            'slug' => 'required|string|max:255|unique:books,slug,' . $request->id,
            'status' => 'required|boolean',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'main_title' => 'required|string',
            'main_content' => 'required|string',
            'main_content_1' => 'required|string',
            'main_content_2' => 'required|string',
            'link_amazon' => 'nullable|string',
            'photo_book' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ];

        $request->validate($validationRules);

        $book = Books::find($request->id);

        $data_updated = [
            'name_book' => $request->name_book,
            'slug' => $request->slug,
            'status' => $request->status,
            'author' => $request->author,
            'publication_year' => $request->publication_year,
            'genre' => $request->genre,
            'description' => $request->description,
            'main_title' => $request->main_title,
            'main_content' => $request->main_content,
            'main_content_1' => $request->main_content_1,
            'main_content_2' => $request->main_content_2,
            'link_amazon' => $request->link_amazon
        ];

        $destinationPath = public_path('images/books');
        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if ($request->hasFile('photo_book')) {
            $imageFile = $request->file('photo_book');

            $oldImagePathFromDb = $book->photo_book;
            $oldImagePath = public_path($oldImagePathFromDb);
            if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

            $imageFile->move($destinationPath, $imageName);

            $data_updated['photo_book'] = 'images/books/' . $imageName;
        } elseif ($request->has('delete_photo') && $request->delete_photo == 1) {
            $oldImagePathFromDb = $book->photo_book;
            $oldImagePath = public_path($oldImagePathFromDb);

            if ($oldImagePathFromDb && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $data_updated['photo_book'] = null;
        }

        $book->update($data_updated);
        return redirect()->route('admin.edit-book', $book->slug)->with('success-update-book', 'You have successfully changed!');
    }

    public function deleteBook($id)
    {
        $book = Books::find($id);

        if ($book->photo_book) {
            $fullPath = public_path($book->photo_book);
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
        }

        $book->delete();
        return redirect()->route('admin.customization-books')->with('success-delete-book', 'You have deleted successfully.');
    }

    public function searchBook(Request $request)
    {
        $data = [
            'search_book' => Books::where('name_book', 'LIKE', '%' . $request->search_name . '%')->get()
        ];

        return view('admin/customization/books/search-book')->with($data);
    }
}
