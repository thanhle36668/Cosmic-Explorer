<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discovery;
use App\Models\Introduction;
use Illuminate\Support\Str; // Để tạo tên file ngẫu nhiên
use Illuminate\Support\Facades\File; // Để kiểm tra/tạo thư mục và xóa file

use Illuminate\Http\Request;

class CustomizationController extends Controller
{
    // Customization Introduction
    public function introduction()
    {
        $data = [
            'information' => Introduction::firstOrFail()
        ];

        return view('admin/customization/introduction')->with($data);
    }

    public function updateIntroduction(Request $request)
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
            return redirect()->back()->with('error', '404 Not Found');
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
                    $oldImagePath = public_path('images/images-introduction' . '/' . $introduction->$item);
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
            'discovery' => Discovery::orderBy('id')->get()
        ];

        return view('admin/customization/discovery')->with($data);
    }
}
