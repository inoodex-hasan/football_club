<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $policy = PrivacyPolicy::first() ?? new PrivacyPolicy();
        return view('backend.privacy-policy.index', compact('policy'));
    }

   public function update(Request $request) 
{
    $request->validate([
        'title' => ['required', 'max:200'],
        'description' => ['required'],
    ]);

    PrivacyPolicy::updateOrCreate(
        ['id' => 6], 
        [
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
        ]
    );

    Toastr::success('Terms & Conditions Updated Successfully');
    return redirect()->back();
}
}