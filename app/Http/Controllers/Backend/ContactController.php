<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Contact, ContactForm};
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\ContactMessageDataTable;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('backend.contact.index', compact('contact'));
    }

    // public function crete(){
    //     return view('backend.contact.create');
    // }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'address' => ['required', 'max:255'],
            'phone' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:100'],
        ]);

        Contact::updateOrCreate(
            ['id' => $id],
            [
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ]
        );

        return redirect()->back()->with('message', 'Contact information updated successfully!');
    }

    public function show(ContactMessageDataTable $dataTable)
    {
        return $dataTable->render('backend.contact.messages');
    }

    public function destroy(string $id)
{
    try {
        $message = ContactForm::findOrFail($id);
        $message->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'The contact message has been deleted successfully.'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Something went wrong. Please try again.'
        ], 500);
    }
}


}