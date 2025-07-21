<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Exception;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function createdSubscribe(Request $request)
    {
        try {
            $person = [
                'name' => $request->name,
                'email' => $request->email,
                'slug' => $request->email,
                'status' => 1
            ];

            Subscribe::create($person);
            return redirect('/')->with('success-subscribe', 'Congratulations! You have successfully subscribed.');
        } catch (Exception $ex) {
            return redirect('/')->with('error-subscribe', 'Email already exists. Please use another email.');
        }
    }

    public function subscribe()
    {
        $data = [
            'subscribe' => Subscribe::orderBy('id', 'desc')->paginate(6)
        ];
        return view('admin/subscribe/all-subscribe')->with($data);
    }

    public function editSubscribe($slug)
    {
        $data = [
            'details_subscribe' => Subscribe::where('slug', $slug)->firstOrFail()
        ];

        return view('admin/subscribe/details-subscribe')->with($data);
    }

    public function updatesSubscribe(Request $request)
    {
        $subscribe = [
            'status' => $request->status
        ];

        Subscribe::where('id', $request->id)->update($subscribe);
        return redirect()->route('admin.subscribe')->with('success-update-subscribe', 'You have updated successfully.');
    }

    public function deleteSubscribe($slug)
    {
        Subscribe::where('slug', $slug)->delete();
        return redirect()->route('admin.subscribe')->with('success-delete-subscribe', 'You have deleted successfully.');
    }

    public function searchSubscribe(Request $request)
    {
        $data = [
            'search_subscribe' => Subscribe::where('email', 'LIKE', '%' . $request->email . '%')->orderBy('id', 'desc')->get()
        ];

        return view('admin/subscribe/search-subscribe')->with($data);
    }
}
