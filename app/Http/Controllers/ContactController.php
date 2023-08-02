<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{

    public function index(): View
    {
        $contacts = auth()->user()->contacts;

        return view('contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        Contact::create($validatedData);

        return redirect()->route('contacts.index')->with('status','Contact Successfully Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact): View
    {
        return \view('contact.show',compact('contact'));
    }

    public function edit(Contact $contact) : View
    {
        return \view('contact.edit',compact('contact'));

    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $validatedData = $request->validated();

        $contact->update($validatedData);

        return redirect()->route('contacts.index')->with('status','Contact Successfully updated.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('status','Contact Successfully Deleted.');

    }
}
