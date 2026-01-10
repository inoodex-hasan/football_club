<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\DataTables\TrainingPackageDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingPackage\{CreateStoreRequest, UpdateRequest};
use App\Models\{TrainingPackage, TrainingPackageImage};
use App\Traits\ImageUploadTrait;
use Brian2694\Toastr\Facades\Toastr;

class TrainingPackageController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(TrainingPackageDataTable $dataTable)
    {
        return $dataTable->render('backend.training-package.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.training-package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStoreRequest $request)
    {
        // Save main package data
        $package = TrainingPackage::create($request->only([
            'name',
            'duration',
            'price',
            'status',
            'is_popular',
            'description',
            'meta_title',
            'meta_description',
        ]));

        // Upload multiple images using trait
        // $images = $this->uploadMultiImage($request, 'images', 'uploads/training_packages');

        // // Save images to related table
        // foreach ($images as $img) {
        //     $package->images()->create(['image' => $img]);
        // }
        if ($request->hasFile('images')) {

            $images = $this->uploadMultiImage(
                $request,
                'images',
                'uploads/training_packages'
            );

            // 3. Extra safety
            if (is_array($images) && count($images) > 0) {
                foreach ($images as $img) {
                    $package->images()->create([
                        'image' => $img
                    ]);
                }
            }
        }

        if ($request->is_popular) {
        // Set EVERY other package to false first
        TrainingPackage::query()->update(['is_popular' => false]);
    }

        Toastr::success('Training Package created successfully.');
        return redirect()->route('admin.training-packages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trainingPackage = TrainingPackage::with('images')->findOrFail($id);
        return view('backend.training-package.edit', compact('trainingPackage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        // dd($request->all());
        $trainingPackage = TrainingPackage::findOrFail($id);
        $trainingPackage->update($request->only([
            'name',
            'duration',
            'price',
            'status',
            'is_popular',
            'description',
            'meta_title',
            'meta_description',
        ]));

        // Upload multiple images using trait
        $images = $this->uploadMultiImage($request, 'images', 'uploads/training_packages');

        // Save images to related table
        if ($images) {
            foreach ($images as $img) {
                $trainingPackage->images()->create(['image' => $img]);
            }
        }

        if ($request->is_popular) {
        // Unset all other packages except this one
        TrainingPackage::where('id', '!=', $id)->update(['is_popular' => false]);
    }
    

        Toastr::success('Training Package updated successfully.');
        return redirect()->route('admin.training-packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainingPackage = TrainingPackage::findOrFail($id);
        foreach ($trainingPackage->images as $image) {
            $this->deleteImage($image->image);
            $image->delete();
        }
        $trainingPackage->delete();
        return response()->json(['status' => 'success', 'message' => 'Training Package deleted successfully.']);
    }


    // Delete single image (Ajax)
    public function destroyImage($id)
    {
        $image = TrainingPackageImage::findOrFail($id);
        $this->deleteImage($image->image);
        $image->delete();
        return response()->json(['status' => 'success', 'message' => 'Image deleted successfully.']);
    }

    /** change status */
    function changeStatus(Request $request)
    {
        $coupon = TrainingPackage::findOrFail($request->id);
        $coupon->status = $request->status == 'true' ? 1 : 0;
        $coupon->save();

        return response(['message' => 'Training Package Status has been Updated!',]);
    }
}
