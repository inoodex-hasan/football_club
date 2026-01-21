<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Message;
use App\DataTables\MessageDataTable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class MessageController extends Controller
{
   public function index(MessageDataTable $dataTable)
{
    return $dataTable->render('backend.messages.index');
}

    public function create()
    {
        return view('backend.messages.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name'     => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'message'  => 'required|string',
            'photo'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status'   => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/messages'), $filename);
            $imagePath = 'uploads/messages/' . $filename;
        }

        Message::create([
            'name'     => $request->name,
            'designation' => $request->designation,
            'message'  => $request->message,
            'photo'    => $imagePath,
            'status'   => $request->status,
        ]);

        Toastr::success('Message Added Successfully');
        return redirect()->route('admin.message.index');
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('backend.messages.edit', compact('message'));
    }

    public function update(Request $request, $id)
{
    $message = Message::findOrFail($id);

    $request->validate([
        'name'     => 'required|string|max:255',
        'position' => 'nullable|string|max:255',
        'message'  => 'required|string',
        'image'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'status'   => 'nullable|boolean',
    ]);

    $imagePath = $message->photo; // keep old image by default
    if ($request->hasFile('image')) {

        // delete old image if exists
        if ($message->photo && file_exists(public_path($message->photo))) {
            unlink(public_path($message->photo));
        }

        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/messages'), $filename);
        $imagePath = 'uploads/messages/' . $filename;
    }

    $message->update([
        'name'     => $request->name,
        'position' => $request->position,
        'photo'    => $imagePath,
        'message'  => $request->message,
        'status'   => $request->status ?? $message->status,
    ]);

    Toastr::success('Message Updated Successfully');
    return redirect()->route('admin.message.index');
}

    public function destroy($id)
{
    try {
        $message = Message::findOrFail($id);
        // Delete image file logic here...
        $message->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    } catch (\Exception $e) {
        return response(['status' => 'error', 'message' => 'Something went wrong!']);
    }
}
}