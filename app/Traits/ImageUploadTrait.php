<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

// use File;

trait ImageUploadTrait
{
    /** handle single image file */
    public function uploadImage(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;
            $image->move(public_path($path), $imageName);
            return $path . '/' . $imageName;
        }
    }

    /** handle multi image file */
    public function uploadMultiImage(Request $request, $inputName, $path)
    {
        $imagepaths = [];
        if ($request->hasFile($inputName)) {
            $images = $request->{$inputName};
            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_' . uniqid() . '.' . $ext;
                $image->move(public_path($path), $imageName);
                $imagepaths[] = $path . '/' . $imageName;
            }
            return $imagepaths;
        }
    }
    /** handle single image update file  */
    public function updateImage(Request $request, $inputName, $path, $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;
            $image->move(public_path($path), $imageName);
            return $path . '/' . $imageName;
        }
    }
    /** handle delete file */
    public function deleteImage(string $path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }

    /** handle special image or file  */

    // public function uploadSpecialImage($request, $imageField, $directory, $oldImage = null)
    // {
    //     if ($request->hasFile($imageField)) {
    //         $file = $request->file($imageField);

    //         // Get extension from original file name
    //         $extension = strtolower($file->getClientOriginalExtension());

    //         $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif', 'ico', 'bmp', 'tiff'];

    //         if (!in_array($extension, $allowed)) {
    //             // যদি original extension allowed না হয়, force use original extension
    //             $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
    //             $extension = strtolower($extension);
    //             if (!in_array($extension, $allowed)) {
    //                 return $oldImage; // reject file
    //             }
    //         }

    //         if (!file_exists(public_path($directory))) {
    //             mkdir(public_path($directory), 0777, true);
    //         }

    //         if ($oldImage && file_exists(public_path($oldImage))) {
    //             unlink(public_path($oldImage));
    //         }

    //         $name = hexdec(uniqid()) . '.' . $extension;
    //         $file->move(public_path($directory), $name);

    //         return $directory . '/' . $name;
    //     }

    //     return $oldImage;
    // }
    public function uploadSpecialImage($request, $imageField, $directory, $oldImage = null)
    {
        if ($request->hasFile($imageField) && $request->file($imageField)->isValid()) {
            $file = $request->file($imageField);

            $extension = strtolower($file->getClientOriginalExtension());

            $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif', 'ico', 'bmp', 'tiff'];

            if (!in_array($extension, $allowed)) {
                $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                if (!in_array($extension, $allowed)) {
                    return $oldImage;
                }
            }

            if (!file_exists(public_path($directory))) {
                mkdir(public_path($directory), 0777, true);
            }

            if ($oldImage && file_exists(public_path($oldImage))) {
                unlink(public_path($oldImage));
            }

            $name = hexdec(uniqid()) . '.' . $extension;
            $file->move(public_path($directory), $name);

            return $directory . '/' . $name;
        }

        // যদি ফাইল না আসে
        return $oldImage;
    }
}
