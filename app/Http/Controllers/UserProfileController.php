<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        return view('profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|mimes:png,jpg',
        ]);

        $admin = Auth::user();

        $admin->name = $request->name;
        $admin->email = $request->email;

        if($request->hasFile('image')) {
            if($admin->image_path) {
                unlink(public_path('storage/'.$admin->image_path));
            }

            $admin->image_path = $request->file('image')->store('profile','public');

        }

        $admin->save();

        noty()->timeout(1000)->success('Porfile updated successfully.');

        return redirect()->back();
        
    }

}
