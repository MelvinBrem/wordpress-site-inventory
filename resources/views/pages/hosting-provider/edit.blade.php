@extends('layouts.app')

@section('title', 'Hosting provider aanpassen | ' . config('app.name'))

@section('content')

    <section class="section">
        <div class="container max-w-150 mx-auto bg-paper p-4 border-stone border-3d">
            <h1 class="h1 mb-4 text-center w-full">Hosting provider aanpassen</h1>

            @include('components.forms.form-edit-hosting-provider')

            <div class="mt-4">
                <a href="/sites">Terug naar overzicht</a>
            </div>
        </div>
    </section>

@endsection
