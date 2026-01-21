<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\{BoardDirector, Team};
use App\Http\Controllers\Controller;
use App\DataTables\BoardDirectorDataTable;
use Brian2694\Toastr\Facades\Toastr;

class BoardDirectorController extends Controller
{
   public function index(BoardDirectorDataTable $dataTable)
{
    return $dataTable->render('backend.board_directors.index');
}

    public function create()
    {
        return view('backend.board_directors.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'image'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/board_directors'), $filename);
            $imagePath = 'uploads/board_directors/' . $filename;
        }

        BoardDirector::create([
            'name'     => $request->name,
            'position' => $request->position,
            'photo'    => $imagePath,
            'status'   => $request->status,
        ]);

        Toastr::success('Board Director Added Successfully');
        return redirect()->route('admin.board_directors.index');
    }

    public function edit($id)
    {
        $boardDirector = BoardDirector::findOrFail($id);
        return view('backend.board_directors.edit', compact('boardDirector'));
    }

    public function update(Request $request, $id)
{
    $boardDirector = BoardDirector::findOrFail($id);

    $request->validate([
        'name'     => 'required|string|max:255',
        'position' => 'nullable|string|max:255',
        'image'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'status'   => 'nullable|boolean',
    ]);

    $imagePath = $boardDirector->photo; // keep old image by default
    if ($request->hasFile('image')) {

        // delete old image if exists
        if ($boardDirector->photo && file_exists(public_path($boardDirector->photo))) {
            unlink(public_path($boardDirector->photo));
        }

        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/board_directors'), $filename);
        $imagePath = 'uploads/board_directors/' . $filename;
    }

    $boardDirector->update([
        'name'     => $request->name,
        'position' => $request->position,
        'photo'    => $imagePath,
        'status'   => $request->status ?? $boardDirector->status,
    ]);

    Toastr::success('Board Director Updated Successfully');
    return redirect()->route('admin.board_directors.index');
}

    public function destroy($id)
{
    try {
        $boardDirector = BoardDirector::findOrFail($id);
        // Delete image file logic here...
        $boardDirector->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    } catch (\Exception $e) {
        return response(['status' => 'error', 'message' => 'Something went wrong!']);
    }
}
}