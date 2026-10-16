@extends('layouts.app')

@section('title', 'Login | ' . config('app.name'))

@section('content')

    <section class="section">
        <div class="container max-w-150 mx-auto bg-paper p-4 border-stone border-3d">
            <h1 class="h1 mb-4 text-center w-full">Login</h1>

            @include('components.forms.form-login')

            <div class="mt-4 pt-4 border-t border-silver">
                <a href="{{ route('auth.register') }}">Heb je nog geen account? Klik hier om een account te registreren.</a>
            </div>
        </div>
    </section>

@endsection
