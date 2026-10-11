<?php

namespace App\Http\Controllers;

use App\Enums\ContactType;
use App\Models\Site;
use App\Models\HostingProvider;
use App\Models\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::latest()->get();

        return view('pages.site-archive', [
            'sites' => $sites
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hosting_providers          = HostingProvider::all();
        $developer_contacts         = Contact::ofType(ContactType::Developer)->get();
        $project_manager_contacts   = Contact::ofType(ContactType::ProjectManager)->get();
        $product_owner_contacts     = Contact::ofType(ContactType::ProductOwner)->get();

        return view('pages.site-create', [
            'hosting_providers'         => $hosting_providers,
            'developer_contacts'        => $developer_contacts,
            'project_manager_contacts'  => $project_manager_contacts,
            'product_owner_contacts'    => $product_owner_contacts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label'                         => 'required|string|max:255',
            'url'                           => 'required|url',
            'notes'                         => 'nullable|string',
            'hosting_provider_id'           => 'required|exists:hosting_providers,id',
            'developer_contact_id'          => 'required|exists:contacts,id',
            'project_manager_contact_id'    => 'required|exists:contacts,id',
            'product_owner_contact_id'      => 'required|exists:contacts,id',
        ]);

        Site::create([
            'label'                         => $validated['label'],
            'url'                           => $validated['url'],
            'notes'                         => $validated['notes'],
            'hosting_provider_id'           => $validated['hosting_provider_id'],
            'developer_contact_id'          => $validated['developer_contact_id'],
            'project_manager_contact_id'    => $validated['project_manager_contact_id'],
            'product_owner_contact_id'      => $validated['product_owner_contact_id'],
        ]);

        return redirect('/sites')->with('message', 'Site aangemaakt');
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
