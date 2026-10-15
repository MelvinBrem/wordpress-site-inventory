<?php

namespace App\Http\Controllers;

use App\Enums\ContactType;
use App\Models\Site;
use App\Models\HostingProvider;
use App\Models\Contact;
use App\Models\Tag;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::latest()->get();

        return view('pages.site.archive', [
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
        $tags                       = Tag::all();

        return view('pages.site.create', [
            'hosting_providers'         => $hosting_providers,
            'developer_contacts'        => $developer_contacts,
            'project_manager_contacts'  => $project_manager_contacts,
            'product_owner_contacts'    => $product_owner_contacts,
            'tags'                      => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'label'                         => 'required|string|max:255',
                'url'                           => 'required|url',
                'notes'                         => 'nullable|string',
                'hosting_provider_id'           => 'required|exists:hosting_providers,id',
                'developer_contact_id'          => 'nullable|exists:contacts,id',
                'project_manager_contact_id'    => 'nullable|exists:contacts,id',
                'product_owner_contact_id'      => 'nullable|exists:contacts,id',
                'tags'                          => 'nullable|array',
                'tags.*'                        => 'integer|exists:tags,id'
            ],
            [
                'label.required'                        => 'De site moet een naam hebben.',
                'url.required'                          => 'De site moet een URL hebben.',
                'url.url'                               => 'De URL moet een geldige URL zijn.',
                'hosting_provider_id.required'          => 'De site moet een hosting provider hebben.',
                'hosting_provider_id.exists'            => 'De hosting provider bestaat niet.',
                'developer_contact_id.exists'           => 'De Developer bestaat niet.',
                'project_manager_contact_id.exists'     => 'De Projectmanager bestaat niet.',
                'product_owner_contact_id.exists'       => 'De Product owner bestaat niet.',
                'tags.*.exists'                         => 'Één of meerdere van de geselecteerde tags bestaat niet (meer).'
            ]
        );

        $site = Site::create([
            'label'                         => $validated['label'],
            'url'                           => $validated['url'],
            'notes'                         => $validated['notes'],
            'hosting_provider_id'           => $validated['hosting_provider_id'],
            'developer_contact_id'          => $validated['developer_contact_id'] ?? null,
            'project_manager_contact_id'    => $validated['project_manager_contact_id'] ?? null,
            'product_owner_contact_id'      => $validated['product_owner_contact_id'] ?? null,
        ]);

        $site->tags()->attach($validated['tags'] ?? []);

        return redirect('/sites')->with('message', 'Site aangemaakt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        $site->load([
            'hostingProvider',
            'developer',
            'projectManager',
            'productOwner',
            'tags',
        ]);

        return view('pages.site.show', [
            'site' => $site,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        $hosting_providers          = HostingProvider::all();
        $developer_contacts         = Contact::ofType(ContactType::Developer)->get();
        $project_manager_contacts   = Contact::ofType(ContactType::ProjectManager)->get();
        $product_owner_contacts     = Contact::ofType(ContactType::ProductOwner)->get();
        $tags                       = Tag::all();

        return view('pages.site.edit', [
            'site'                      => $site,
            'hosting_providers'         => $hosting_providers,
            'developer_contacts'        => $developer_contacts,
            'project_manager_contacts'  => $project_manager_contacts,
            'product_owner_contacts'    => $product_owner_contacts,
            'tags'                      => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        $validated = $request->validate(
            [
                'label'                         => 'required|string|max:255',
                'url'                           => 'required|url',
                'notes'                         => 'nullable|string',
                'hosting_provider_id'           => 'required|exists:hosting_providers,id',
                'developer_contact_id'          => 'nullable|exists:contacts,id',
                'project_manager_contact_id'    => 'nullable|exists:contacts,id',
                'product_owner_contact_id'      => 'nullable|exists:contacts,id',
                'tags'                          => 'nullable|array',
                'tags.*'                        => 'integer|exists:tags,id'
            ],
            [
                'label.required'                        => 'De site moet een naam hebben.',
                'url.required'                          => 'De site moet een URL hebben.',
                'url.url'                               => 'De URL moet een geldige URL zijn.',
                'hosting_provider_id.required'          => 'De site moet een hosting provider hebben.',
                'hosting_provider_id.exists'            => 'De hosting provider bestaat niet.',
                'developer_contact_id.exists'           => 'De Developer bestaat niet.',
                'project_manager_contact_id.exists'     => 'De Projectmanager bestaat niet.',
                'product_owner_contact_id.exists'       => 'De Product owner bestaat niet.',
                'tags.*.exists'                         => 'Één of meerdere van de geselecteerde tags bestaat niet (meer).'
            ]
        );

        $site->update([
            ...$validated,
            'developer_contact_id'          => $validated['developer_contact_id'] ?? null,
            'project_manager_contact_id'    => $validated['project_manager_contact_id'] ?? null,
            'product_owner_contact_id'      => $validated['product_owner_contact_id'] ?? null,
        ]);
        $site->tags()->sync($validated['tags'] ?? []);

        return redirect('/sites/' . $site->id . '/edit')->with('message', 'Site aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        $site->delete();

        return redirect('/sites')->with('message', 'Site verwijderd');
    }
}
