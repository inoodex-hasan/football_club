<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryImages\GalleryImageStoreRequest;
use App\Models\GalleryImage;
use App\Traits\ImageUploadTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = GalleryImage::select('id', 'image')->paginate(40);
        return view('backend.image-gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.image-gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryImageStoreRequest $request)
    {
        if ($request->hasFile('images')) {
            $uploadedPaths = $this->uploadMultiImage($request, 'images', 'uploads/gallery_images');

            foreach ($uploadedPaths as $path) {
                GalleryImage::create([
                    'image' => $path,
                ]);
            }
        }
        Toastr::success('Gallery Images Uploaded Successfully', 'Success');
        return redirect()->route('admin.gallery-images.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = GalleryImage::findOrFail($id);
        $this->deleteImage($image->image);
        $image->delete();
        return response()->json(['status' => 'success', 'message' => 'Image deleted successfully.']);
    }
}
