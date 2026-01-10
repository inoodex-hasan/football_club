<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        // $validated = $request->validate([
        //     'Full_name'     => 'required|string|max:255',
        //     'Email_address' => 'required|email|max:255',
        //     'Phone_number'  => 'required|string|max:20',
        //     'Message'       => 'required|string',
        // ]);

        // ContactForm::create($validated);
        $request->validate([
            'name'     => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone'  => 'required|string|max:20',
            'message'       => 'required|string',
        ]);

        ContactForm::create([
            'Full_name' => $request->name,
            'Email_address' => $request->email,
            'Phone_number' => $request->phone,
            'Message' => $request->message,
        ]);

        return back()->with('success', 'Your message has been sent!');
    }
}
