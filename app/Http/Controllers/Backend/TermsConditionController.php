<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class TermsConditionController extends Controller
{
    public function index()
    {
        $terms = TermsCondition::first() ?? new TermsCondition();
        return view('backend.terms_conditions.index', compact('terms'));
    }

public function update(Request $request) 
{
    $request->validate([
        'title' => ['required', 'max:200'],
        'description' => ['required'],
    ]);

    TermsCondition::updateOrCreate(
        ['id' => 2], 
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