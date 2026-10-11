@extends('layouts.app')

@section('title', 'Home | ' . config('app.name'))

@section('content')
    @include('components.form-site-create')
@endsection
