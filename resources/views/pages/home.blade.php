@extends('layouts.app')

@section('title', 'Home | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto grid grid-cols-1 xl:grid-cols-2 gap-4">

            <div class="col-span-full xl:col-span-2 bg-paper border-3d border-stone p-4">
                <h2 class="h3 mb-4">Laatst toegevoegde sites</h2>

                @include('components.tables.table-sites', [
                    'preview' => 'true',
                ])
            </div>

            <div class="col-span-full xl:col-span-1 bg-paper border-3d border-stone p-4">
                <h2 class="h3 mb-4">Laatst toegevoegde contactpersonen</h2>

                @include('components.tables.table-contacts', [
                    'preview' => 'true',
                ])
            </div>

            <div class="col-span-full xl:col-span-1 bg-paper border-3d border-stone p-4">
                <h2 class="h3 mb-4">Laatst toegevoegde hosting providers</h2>

                @include('components.tables.table-hosting-providers', [
                    'preview' => 'true',
                ])
            </div>
        </div>
    </section>
@endsection
