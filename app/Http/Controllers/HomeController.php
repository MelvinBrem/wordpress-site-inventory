<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\HostingProvider;
use App\Models\Site;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $sites = Site::latest()->take(5)->get();
        $contacts = Contact::latest()->take(5)->get();
        $hosting_providers = HostingProvider::latest()->take(5)->get();

        return view('home', [
            'sites'             => $sites,
            'contacts'          => $contacts,
            'hosting_providers' => $hosting_providers
        ]);
    }
}
