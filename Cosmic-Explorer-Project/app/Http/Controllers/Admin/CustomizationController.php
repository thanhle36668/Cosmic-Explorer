<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\Discovery;
use App\Models\Introduction;
use App\Models\Planets;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CustomizationController extends Controller
{
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

        $validationRules['photo'] = 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048';

        for ($i = 2; $i <= 8; $i++) {
            $validationRules['photo_' . $i] = 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048';
        }

        $request->validate($validationRules);

        $introduction = Introduction::find($request->id);

        $data_update = [
            'website_name' => $request->website_name,
            'short_introduction' => $request->short_introduction,
            'short_introduction_2' => $request->short_introduction_2,
            'company_description' => $request->company_description
        ];

        $destinationPath = public_path('images/images-introduction');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $photoArray = ['photo'];
        for ($i = 2; $i <= 8; $i++) {
            $photoArray[] = 'photo_' . $i;
        }

        foreach ($photoArray as $item) {
            if ($request->hasFile($item)) {
                $imageFile = $request->file($item);

                if ($introduction->$item) {
                    $filenameInDb = basename($introduction->$item);
                    $oldImagePath = public_path('images/images-introduction' . '/' . $filenameInDb);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_update[$item] = 'images/images-introduction/' . $imageName;
            }
        }
        $introduction->update($data_update);

        return redirect()->route('admin.customization-introduction')->with('success-update-introduction', 'You have successfully changed!');
    }

    // Customization Discovery
    public function discovery()
    {
        $data = [
            'discovery' => Discovery::orderBy('id', 'desc')->paginate(4)
        ];

        return view('admin/customization/discovery/discovery')->with($data);
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
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
        ];

        $request->validate($validationRules);

        $post = Discovery::find($request->id);

        $data_update = [
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'author' => $request->author,
            'status' => $request->status,
            'description_short' => $request->description_short,
            'title_details' => $request->title_details,
            'description_details' => $request->description_details,
            'content_1' => $request->content_1,
            'content_2' => $request->content_2
        ];

        $destinationPath = public_path('images/discovery');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $photoArray = ['photo', 'photo_2'];

        foreach ($photoArray as $item) {
            if ($request->hasFile($item)) {
                $imageFile = $request->file($item);

                $oldImagePathFromDb = $post->$item;

                if ($oldImagePathFromDb && File::exists(public_path($oldImagePathFromDb))) {
                    File::delete(public_path($oldImagePathFromDb));
                }

                $imageName = 'updated' . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_update[$item] = 'images/discovery/' . $imageName;
            }
        }

        $post->update($data_update);

        return redirect()->route('admin.edit-discovery', $post->slug)->with('success-update-discovery', 'You have successfully changed!');
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
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_2' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'name_photo' => 'required|string|max:255|',
            'name_photo_2' => 'required|string|max:255|',
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
                'name_photo' => $request->name_photo,
                'name_photo_2' => $request->name_photo_2,
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

    // Customization Planets
    public function planets()
    {
        $data = [
            'planets' => Planets::paginate(4)
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
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_2' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_3' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_4' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_5' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
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
            return redirect()->back()->with('error-create-planet', 'Failed to create post due to an internal error. Please try again.');
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
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_3' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_4' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'photo_5' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
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
            if ($request->hasFile($item)) {
                $imageFile = $request->file($item);

                $oldImagePathFromDb = $planet->$item;
                $oldImagePath = public_path($oldImagePathFromDb);
                if ($oldImagePathFromDb && $oldImagePath) {
                    File::delete($oldImagePath);
                }

                $imageName = 'update' . '_' . Str::ramdom(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_update[$item] = 'images/planets' . $imageName;
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
}
