<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use App\DataTables\TeamDataTable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
   public function index(TeamDataTable $dataTable)
{
    return $dataTable->render('backend.teams.index');
}

    public function create()
    {
        return view('backend.teams.create');
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
            $file->move(public_path('uploads/team'), $filename);
            $imagePath = 'uploads/team/' . $filename;
        }

        Team::create([
            'name'     => $request->name,
            'position' => $request->position,
            'photo'    => $imagePath,
            'status'   => $request->status,
        ]);

        Toastr::success('Team Member Added Successfully');
        return redirect()->route('admin.teams.index');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('backend.teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'photo'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $team = Team::findOrFail($id);
        $imagePath = $team->photo;

        if ($request->hasFile('photo')) {
            if (File::exists(public_path($team->photo))) {
                File::delete(public_path($team->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/team'), $filename);
            $imagePath = 'uploads/team/' . $filename;
        }

        $team->update([
            'name'     => $request->name,
            'position' => $request->position,
            'photo'    => $imagePath,
            'status'   => $request->status,
        ]);

        Toastr::success('Team Member Updated Successfully');
        return redirect()->route('admin.teams.index');
    }

    public function destroy($id)
{
    try {
        $team = Team::findOrFail($id);
        // Delete image file logic here...
        $team->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    } catch (\Exception $e) {
        return response(['status' => 'error', 'message' => 'Something went wrong!']);
    }
}
}