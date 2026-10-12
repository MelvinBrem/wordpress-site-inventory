@extends('layouts.app')

@section('title', 'Site overzicht | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto bg-paper p-4 border-3d border-stone">
            <div class="flex items-center relative pb-4 mb-4 border-b-2 border-silver">
                <h1 class="h2">
                    Overzicht van alle sites
                </h1>
                <a href="/sites/create" class="button ml-auto">
                    Site aanmaken
                </a>
            </div>

            <div class="overflow-x-auto">

                @include('components.tables.table-sites', [
                    'preview' => 'false',
                ])

            </div>
    </section>
@endsection
