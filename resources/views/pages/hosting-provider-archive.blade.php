@extends('layouts.app')

@section('title', 'Hosting providers overzicht | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto">

            @include('components.table-hosting-providers', [
                'title' => 'Overzicht van alle hosting providers',
                'preview' => 'false',
            ])

        </div>
    </section>
@endsection
