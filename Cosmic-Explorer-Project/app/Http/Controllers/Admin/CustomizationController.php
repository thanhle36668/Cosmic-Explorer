<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discovery;
use App\Models\Introduction;
use Exception;
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
        if (!$introduction) {
            return redirect()->back()->with('error-not-found', '404 Not Found');
        }

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

    // Customization Introduction
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
        if (!$post) {
            return redirect('/customization-discovery')->with('error-not-found', '404 Not Found');
        }

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
                'slug' => Str::slug($request->slug),
                'status' => 0,
                'author' => $request->author,
                'description_short' => $request->description_short,
                'title_details' => $request->title_details,
                'description_details' => $request->description_details,
                'content_1' => $request->content_1,
                'content_2' => $request->content_2,
                'photo' => $request->photo,
                'photo_2' => $request->photo_2,
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
        Discovery::find($id)->delete();
        return redirect()->route('admin.customization-discovery')->with('success-delete-discovery', 'You have deleted successfully.');
    }

    public function searchDiscovery(Request $request)
    {
        $data = [
            'search_discovery' => Discovery::Where('title', 'LIKE', '%' . $request->search_title . '%')->get()
        ];

        return view('admin/customization/discovery/search-discovery')->with($data)->with('success-search-discovery', 'Tìm kiếm thành công');
    }
}
