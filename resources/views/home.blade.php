@extends('layouts.app')

@section('title', 'Home | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto grid grid-cols-1 xl:grid-cols-2 gap-4">
            @include('components.table-sites', [
                'title' => 'Laatst toegevoegde sites',
                'preview' => 'true',
            ])
            @include('components.table-contacts', [
                'title' => 'Laatst toegevoegde contactpersonen',
                'preview' => 'true',
            ])
        </div>
    </section>
@endsection
