@extends('layouts.app')

@section('title', 'Hosting providers overzicht | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto bg-paper p-4 border-3d border-stone">
            <div class="flex items-center relative mb-4">
                <h1 class="h2">
                    Overzicht van alle hosting providers
                </h1>
                <a href="/hosting-providers/create" class="button ml-auto">
                    Hosting provider aanmaken
                </a>
            </div>

            <div class="overflow-x-auto">
                @include('components.tables.table-hosting-providers', [
                    'preview' => 'false',
                ])
            </div>
        </div>
    </section>
@endsection
