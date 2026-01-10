<?php

namespace App\Http\Controllers\Backend;

use App\Models\Review;
use Illuminate\Http\Request;
use App\DataTables\ReviewDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    public function index(ReviewDataTable $dataTable)
{
    return $dataTable->render('backend.review.index');
}

    public function create()
    {
        return view('backend.review.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'designation' => 'nullable|max:255',
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean'
        ]);

        $review = new Review();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'review_'.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/reviews'), $imageName);
            $review->image = 'uploads/reviews/' . $imageName;
        }

        $review->name = $request->name;
        $review->designation = $request->designation;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->status = $request->status;
        $review->save();

        return redirect()->route('admin.reviews.index')->with('message', 'Review created successfully!');
    }

    public function edit(Review $review)
    {
        return view('backend.review.edit', compact('review'));
    }

    public function update (Request $request, Review $review)
    {
        $request->validate([
            'name' => 'required|max:255',
            'comment' => 'required',
            'rating' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if (File::exists(public_path($review->image))) {
                File::delete(public_path($review->image));
            }
            
            $image = $request->file('image');
            $imageName = 'review_'.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/reviews'), $imageName);
            $review->image = 'uploads/reviews/' . $imageName;
        }

        $review->name = $request->name;
        $review->designation = $request->designation;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->status = $request->status;
        $review->save();

        return redirect()->route('admin.reviews.index')->with('message', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        if (File::exists(public_path($review->image))) {
            File::delete(public_path($review->image));
        }
        $review->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}