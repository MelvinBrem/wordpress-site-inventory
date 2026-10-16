@extends('layouts.app')

@section('title', 'Site aanmaken | ' . config('app.name'))

@section('content')

    <section class="section">
        <div class="container max-w-150 mx-auto bg-paper p-4 border-stone border-3d">
            <h1 class="h1 mb-4 text-center w-full">Site aanmaken</h1>

            @include('components.forms.form-create-site')

            <div class="mt-4 pt-4 border-t border-silver">
                <a href="/sites">Terug naar overzicht</a>
            </div>
        </div>
    </section>

@endsection
