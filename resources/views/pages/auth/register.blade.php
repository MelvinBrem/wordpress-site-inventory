@extends('layouts.app')

@section('title', 'Registreren | ' . config('app.name'))

@section('content')

    <section class="section">
        <div class="container max-w-150 mx-auto bg-paper p-4 border-stone border-3d">
            <h1 class="h1 mb-4 text-center w-full">Registreren</h1>

            @include('components.forms.form-register')

            <div class="mt-4 pt-4 border-t border-silver">
                <a href="{{ route('auth.login') }}">Heb je al een account? Klik hier om in te loggen.</a>
            </div>
        </div>
    </section>

@endsection
