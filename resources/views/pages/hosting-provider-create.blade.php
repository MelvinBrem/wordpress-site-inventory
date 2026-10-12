@extends('layouts.app')

@section('title', 'Hosting provider aanmaken | ' . config('app.name'))

@section('content')

    <section class="section">
        <div class="container max-w-150 mx-auto bg-paper p-4 border-stone border-3d">
            <h1 class="h1 mb-4 text-center w-full">Hosting provider aanmaken</h1>

            @include('components.form-hosting-provider-create')

        </div>
    </section>

@endsection
