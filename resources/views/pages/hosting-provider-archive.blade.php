@extends('layouts.app')

@section('title', 'Hosting providers overzicht | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto bg-paper p-4 border-3d border-stone">
            <div class="flex items-center relative pb-4 mb-4 border-b-2 border-silver">
                <h1 class="h2">
                    Overzicht van alle hosting providers
                </h1>
                <a href="/create-hosting-provider" class="button ml-auto">
                    Hosting provider toevoegen
                </a>
            </div>

            <div class="overflow-x-auto">
                @include('components.table-hosting-providers', [
                    'preview' => 'false',
                ])
            </div>
        </div>
    </section>
@endsection
