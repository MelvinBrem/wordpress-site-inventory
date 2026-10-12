<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Enums\ContactType;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('pages.contact.archive', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.contact.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email_address' => 'required|string|email|max:255',
            'phone_number'  => 'nullable|string|max:255',
            'address'       => 'nullable|string|max:255',
            'company_name'  => 'nullable|string|max:255',
            'types'         => 'nullable|array|min:1',
            'types.*'       => Rule::enum(ContactType::class),
        ]);

        Contact::create([
            'name'          => $validated['name'],
            'email_address' => $validated['email_address'],
            'phone_number'  => $validated['phone_number'],
            'address'       => $validated['address'],
            'company_name'  => $validated['company_name'],
            'types'         => $validated['types'] ?? [],
        ]);

        return redirect('/contacts')->with('message', 'Contactpersoon aangemaakt');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
