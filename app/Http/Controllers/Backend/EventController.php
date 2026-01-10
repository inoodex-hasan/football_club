<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\EventDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\{EventStoreRequest, EventUpdateRequest};
use App\Models\Event;
use App\Traits\ImageUploadTrait;
use Brian2694\Toastr\Facades\Toastr;

class EventController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(EventDataTable $dataTable)
    {
        return $dataTable->render('backend.event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventStoreRequest $request)
    {
        // Single Image Upload (Main Image)
        $mainImagePath = null;
        if ($request->hasFile('main_image')) {
            $mainImagePath = $this->uploadImage($request, 'main_image', 'uploads/events');
        }

        // Multiple Images Upload (Gallery Images)
        $galleryImages = [];
        if ($request->hasFile('images')) {
            $galleryImages = $this->uploadMultiImage($request, 'images', 'uploads/events/gallery');
        }

        // Save Event
        Event::create([
            'title' => $request->title,
            'details' => $request->details,
            'status' => $request->status,
            'main_image' => $mainImagePath,
            'images' => $galleryImages,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        Toastr::success('Event Created Successfully!');
        return redirect()->route('admin.events.index');
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
        $event = Event::findOrFail($id);
        return view('backend.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventUpdateRequest $request, string $id)
    {
        // dd($request->all());
        $event = Event::findOrFail($id);
        DB::beginTransaction();
        try {
            // Main Image update
            if ($request->hasFile('main_image')) {
                if ($event->main_image) {
                    $this->deleteImage($event->main_image); // trait method
                }
                $event->main_image = $this->uploadImage($request, 'main_image', 'uploads/events');
            }

            // Gallery Images update
            $oldImages = $request->old_images ?? []; // old images array
            $newImages = [];
            if ($request->hasFile('images')) {
                $newImages = $this->uploadMultiImage($request, 'images', 'uploads/events/gallery');
            }
            $event->images = array_merge($oldImages, $newImages); // old + new merged

            // Update other fields
            $event->title = $request->title;
            $event->details = $request->details;
            $event->status = $request->status;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->location = $request->location;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->save();

            DB::commit();
            Toastr::success('Event Updated Successfully');
            return redirect()->route('admin.events.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Something went wrong: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        try {
            // Delete main image
            if ($event->main_image) {
                $this->deleteImage($event->main_image); // trait method
            }

            // Delete gallery images
            if ($event->images && is_array($event->images)) {
                foreach ($event->images as $img) {
                    $this->deleteImage($img); // trait method
                }
            }

            // Delete event from DB
            $event->delete();

            // Toastr::success('Event deleted successfully');
            // return redirect()->route('admin.events.index');
            return response()->json(['status' => 'success', 'message' => 'Event deleted successfully.']);
        } catch (\Exception $e) {
            Toastr::error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

        public function changeStatus(Request $request)
        {
            $event = Event::findOrFail($request->id); 
            $event->status = $request->status == 'true' ? 1 : 0;
            $event->save();

            return response(['message' => 'Event Status has been Updated!']);
        }
}
