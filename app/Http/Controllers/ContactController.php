<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Mail;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $contacts = Contact::get();
       return view('admin.messages.message', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('contact'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'firstName'=>'required|string|max:50',
            'lastName'=>'required|string|max:50',
            'email'=> 'required|email:rfc,dns',
            'message' => 'required',
            ]);
        Contact::create($data);
        Mail::to( 'noha@gmail.com')->send( 
            new ContactMail($data)
        );
        return redirect('contact')->with('success', 'Send Email');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact= Contact::findOrFail($id);
        $contact->update(['read_at' => 1]);
        return view('admin.messages.showMessage', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id', $id)->delete();
        return redirect('admin/message')->with('danger', 'Delete Data Success');
    }
}
