<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSection\{AboutUpdateRequest, MissionUpdateRequest, VisionUpdateRequest};
use App\Models\{About, Mission, Vision};
use Brian2694\Toastr\Facades\Toastr;

class AboutSectionController extends Controller
{
 public function about()
{
    $about = About::first() ?? new About(); 
    return view('backend.about-section.about', compact('about'));
}

public function aboutUpdate(AboutUpdateRequest $request) 
{
    $about = About::find(1);
    $paths = $about->images ?? []; // Start with existing images or empty array

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/about/', $filename);
            $paths[] = 'uploads/about/' . $filename; // Add new path to array
        }
    }

    About::updateOrCreate(['id' => 1], [
        'title'       => $request->title,
        'description' => $request->description,
        'images'      => $paths, // Laravel will encode this array to JSON automatically
        'status'      => $request->status,
    ]);

    Toastr::success('About Section Updated Successfully');
    return redirect()->back();
}

public function deleteImage(Request $request)
{
    $about = About::first(); // Or find by ID
    $images = $about->images;

    // 1. Delete physical file
    if (file_exists(public_path($request->image_path))) {
        unlink(public_path($request->image_path));
    }

    // 2. Remove from array using index
    if (isset($images[$request->image_index])) {
        unset($images[$request->image_index]);
    }

    // 3. Re-index and save
    $about->images = array_values($images);
    $about->save();

    return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
}
    public function mission()
    {
        $content = Mission::select('id', 'title', 'description', 'status')->first();
        return view('backend.about-section.mission', compact('content'));
    }
    public function missionUpdate(MissionUpdateRequest $request)
    {

        Mission::updateOrCreate(['id' => 1], [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        Toastr::success('Mission Section Updated Successfully');
        return redirect()->back();
    }

    public function vision()
    {
        $content = Vision::select('id', 'title', 'description', 'status')->first();
        return view('backend.about-section.vision', compact('content'));
    }
    public function visionUpdate(VisionUpdateRequest $request)
    {
        Vision::updateOrCreate(['id' => 1], [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        Toastr::success('Vision Section Updated Successfully');
        return redirect()->back();
    }
}
