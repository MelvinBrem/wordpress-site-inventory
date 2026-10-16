@extends('layouts.app')

@section('title', 'Contactpersonen overzicht | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto">
            <section class="section {{ $classes ?? '' }}">
                <div class="container mx-auto bg-paper p-4 border-3d border-stone">
                    <div class="flex items-center relative mb-4">
                        <h1 class="h2">
                            {{ $title ?? 'Overzicht van contactpersonen' }}
                        </h1>
                        <a href="/contacts/create" class="button ml-auto">
                            Contactpersoon aanmaken
                        </a>
                    </div>

                    <div class="overflow-x-auto">

                        @include('components.tables.table-contacts', [
                            'title' => 'Overzicht van alle contactpersonen',
                            'preview' => 'false',
                        ])
                    </div>
            </section>
        @endsection
