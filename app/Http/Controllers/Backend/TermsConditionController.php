<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\TermsCondition;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class TermsConditionController extends Controller
{
    public function index()
    {
        $terms = TermsCondition::latest()->get();
        return view('backend.terms_conditions.index', compact('terms'));
    }

    // Show create form
    public function create()
    {
        return view('backend.terms_conditions.create');
    }

    // Store new term
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'required|string',
            'status'      => 'nullable|boolean',
        ]);

        TermsCondition::create([
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status ?? 1,
        ]);

        Toastr::success('Terms & Conditions added successfully');
        return redirect()->route('admin.terms_conditions.index');
    }

    // Show edit form
    public function edit($id)
    {
        $term = TermsCondition::findOrFail($id);
        return view('backend.terms_conditions.edit', compact('term'));
    }

    // Update existing term
    public function update(Request $request, $id)
    {
        $term = TermsCondition::findOrFail($id);

        $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'required|string',
            'status'      => 'nullable|boolean',
        ]);

        $term->update([
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status ?? $term->status,
        ]);

        Toastr::success('Terms & Conditions updated successfully');
        return redirect()->route('admin.terms_conditions.index');
    }

    // Delete term
    public function destroy($id)
    {
        $term = TermsCondition::findOrFail($id);
        $term->delete();

        Toastr::success('Terms & Conditions deleted successfully');
        return redirect()->route('admin.terms_conditions.index');
    }
}
