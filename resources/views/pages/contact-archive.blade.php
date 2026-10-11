@extends('layouts.app')

@section('title', 'Contactpersonen overzicht | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto">
            <section class="section {{ $classes ?? '' }}">
                <div class="container mx-auto bg-paper p-4 border-3d border-stone">
                    <div class="flex items-center relative pb-4 mb-4 border-b-2 border-silver">
                        <h1 class="h2">
                            {{ $title ?? 'Overzicht van contactpersonen' }}
                        </h1>
                        <a href="/create-contact" class="button ml-auto">
                            Contactpersoon toevoegen
                        </a>
                    </div>

                    <div class="overflow-x-auto">

                        @include('components.table-contacts', [
                            'title' => 'Overzicht van alle contactpersonen',
                            'preview' => 'false',
                        ])
                    </div>
            </section>
        @endsection
