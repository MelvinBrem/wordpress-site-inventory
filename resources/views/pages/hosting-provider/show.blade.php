@extends('layouts.app')

@section('title', $hosting_provider->label . ' | ' . config('app.name'))

@section('content')

    <section class="section">
        <div class="container max-w-150 mx-auto bg-paper p-4 border-stone border-3d">
            <h1 class="h1 mb-4 text-center w-full">{{ $hosting_provider->label }}</h1>

            <table class="details border-stone border-3d">
                <tbody>
                    <tr>
                        <td class="font-bold">Label</td>
                        <td>{{ $hosting_provider->label }}</td>
                    </tr>
                    <tr>
                        <td>URL</td>
                        <td>
                            @if ($hosting_provider->url)
                                <a href="{{ str($hosting_provider->url)->is('http*') ? $hosting_provider->url : 'https://' . $hosting_provider->url }}"
                                    target="_blank">{{ $hosting_provider->url }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Contactpersoon</td>
                        <td>
                            @if ($hosting_provider->contact)
                                <a
                                    href="/contacts/{{ $hosting_provider->contact->id }}">{{ $hosting_provider->contact->name }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex flex-row gap-2 mt-4 pt-4 border-t border-silver">
                <a href="/hosting-providers">Terug naar overzicht</a>
                <a href="/hosting-providers/{{ $hosting_provider->id }}/edit" class="ml-auto">Aanpassen</a>
            </div>
        </div>
    </section>

@endsection
