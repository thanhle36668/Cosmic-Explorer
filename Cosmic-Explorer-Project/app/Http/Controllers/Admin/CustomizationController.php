<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $introduction = Introduction::find($request->id);
        if (!$introduction) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin giới thiệu để cập nhật.');
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

        $photoFields = ['photo'];
        for ($i = 2; $i <= 8; $i++) {
            $photoFields[] = 'photo_' . $i;
        }

        foreach ($photoFields as $field) {
            if ($request->hasFile($field)) {
                $imageFile = $request->file($field);

                if ($introduction->$field) {
                    $oldImagePath = public_path('images/images-introduction' . '/' . $introduction->$field);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();

                $imageFile->move($destinationPath, $imageName);

                $data_update[$field] = $imageName;
            }
        }
        $introduction->update($data_update);

        return redirect()->route('admin.customization-introduction')->with('success-update-introduction', 'You have successfully changed!');
    }
}
