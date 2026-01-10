<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfilePasswordUpdateRequest;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Traits\ImageUploadTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        return view('backend.profile.index');
    }
    public function updateProfile(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        // Upload image using trait
        if ($request->hasFile('image')) {
            $user->image = $this->uploadImage($request, 'image', 'uploads/admin_profile');
        }

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        Toastr::success('Profile Updated Successfully!');
        return back();
    }
    public function updatePassword(ProfilePasswordUpdateRequest $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        Toastr::success('Password Updated Successfully!');
        return redirect()->back();
    }
}
