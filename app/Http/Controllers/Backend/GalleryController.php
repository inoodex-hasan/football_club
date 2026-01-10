<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;

class GalleryController extends Controller
{

    public function index()
    {
        $gallery = Gallery::select('id', 'images', 'videos')->paginate(40);
        return view('backend.gallery.index', compact('gallery'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title'    => 'nullable|string|max:255',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        'videos.*' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200',
    ]);

    $imageData = [];
    $videoData = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/gallery/images'), $name);
            $imageData[] = 'uploads/gallery/images/' . $name;
        }
    }

    if ($request->hasFile('videos')) {
        foreach ($request->file('videos') as $video) {
            $name = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/gallery/videos'), $name);
            $videoData[] = 'uploads/gallery/videos/' . $name;
        }
    }

    Gallery::create([
        'title'  => $request->title,
        'images' => $imageData,
        'videos' => $videoData,
    ]);

    Toastr::success('Files uploaded successfully!');
    return back();
}
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title'    => 'nullable|string|max:255',
    //         'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
    //         'videos.*' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200',
    //     ]);

    //     $imageData = [];
    //     $videoData = [];

    //     // 1. Process Multiple Images
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $image) {
    //             $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    //             $image->move(public_path('uploads/gallery/images'), $name);
    //             $imageData[] = 'uploads/gallery/images/' . $name;
    //         }
    //     }

    //     // 2. Process Multiple Videos
    //     if ($request->hasFile('videos')) {
    //         foreach ($request->file('videos') as $video) {
    //             $name = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
    //             $video->move(public_path('uploads/gallery/videos'), $name);
    //             $videoData[] = 'uploads/gallery/videos/' . $name;
    //         }
    //     }

    //     Gallery::create([
    //         'title'  => $request->title,
    //         'images' => $imageData,
    //         'videos' => $videoData,
    //     ]);

    //     return back()->with('success', 'Files uploaded to public/uploads!');
    // }

    public function destroy(Gallery $gallery)
    {
        // Delete physical images from public/uploads
        if ($gallery->images) {
            foreach ($gallery->images as $path) {
                if (File::exists(public_path($path))) {
                    File::delete(public_path($path));
                }
            }
        }

        // Delete physical videos from public/uploads
        if ($gallery->videos) {
            foreach ($gallery->videos as $path) {
                if (File::exists(public_path($path))) {
                    File::delete(public_path($path));
                }
            }
        }

        $gallery->delete();
        return back()->with('success', 'Gallery deleted.');
    }

    public function deleteMedia(Request $request, Gallery $gallery)
{
    $pathToRemove = $request->path; // The path sent via AJAX
    $type = $request->type;         // 'images' or 'videos'

    // 1. Delete the physical file from public/uploads
    if (File::exists(public_path($pathToRemove))) {
        File::delete(public_path($pathToRemove));
    }

    // 2. Remove the path from the array
    $currentFiles = $gallery->$type;
    $updatedFiles = array_values(array_diff($currentFiles, [$pathToRemove]));

    // 3. Update the database
    $gallery->update([
        $type => $updatedFiles
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Media item deleted successfully!'
    ]);
}
}