<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\HostingProvider;

use Illuminate\Http\Request;

class HostingProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hosting_providers = HostingProvider::with('contact')->latest()->get();

        return view('pages.hosting-provider.archive', [
            'hosting_providers' => $hosting_providers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Contact::orderBy('name')->get();

        return view('pages.hosting-provider.create', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'contact_id' => 'nullable|exists:contacts,id',
        ]);

        HostingProvider::create([
            'label' => $validated['label'],
            'url' => $validated['url'] ?? null,
            'contact_id' => $validated['contact_id'] ?? null,
        ]);

        return redirect('/hosting-providers')->with('message', 'Hosting provider aangemaakt');
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
