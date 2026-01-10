<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Str;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $policies = PrivacyPolicy::latest()->get();
        return view('backend.privacy-policy.index', compact('policies'));
    }

    public function create()
    {
        return view('backend.privacy-policy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'status' => ['required', 'boolean'],
        ]);

        $policy = new PrivacyPolicy();
        $policy->title = $request->title;
        $policy->description = $request->description;
        $policy->status = $request->status;
        $policy->save();

        Toastr::success('Privacy Policy Created Successfully!');
        return redirect()->route('admin.privacy-policies.index');
    }

    public function changeStatus(Request $request)
    {
        $policy = PrivacyPolicy::findOrFail($request->id);
        $policy->status = $request->status == 'true' ? 1 : 0;
        $policy->save();

        return response(['message' => 'Status has been updated!']);
    }

    // public function edit($id)
    // {
    //     $policy = PrivacyPolicy::findOrFail($id);
    //     return view('backend.privacy-policy.edit', compact('policy'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => ['required', 'max:200'],
    //         'description' => ['required'],
    //         'status' => ['required', 'boolean'],
    //     ]);

    //     $policy = PrivacyPolicy::findOrFail($id);
    //     $policy->title = $request->title;
    //     $policy->description = $request->description;
    //     $policy->status = $request->status;
    //     $policy->save();

    //     Toastr::success('Privacy Policy Updated Successfully!');
    //     return redirect()->route('admin.privacy-policies.index');
    // }

    // public function destroy($id)
    // {
    //     PrivacyPolicy::destroy($id);
    //     Toastr::success('Privacy Policy Deleted Successfully!');
    //     return redirect()->route('admin.privacy-policies.index');
    // }
}