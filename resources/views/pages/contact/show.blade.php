@extends('layouts.app')

@section('title', $contact->name . ' | ' . config('app.name'))

@section('content')

    <section class="section">
        <div class="container max-w-150 mx-auto bg-paper p-4 border-stone border-3d">
            <h1 class="h1 mb-4 text-center w-full">{{ $contact->name }}</h1>

            <table class="details border-stone border-3d">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>
                            <a href="mailto:{{ $contact->email_address }}">{{ $contact->email_address }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>
                            @if ($contact->phone_number)
                                <a href="tel:{{ $contact->phone_number }}">{{ $contact->phone_number }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $contact->address ?: '-' }}</td>
                    </tr>
                    <tr>
                        <td>Company Name</td>
                        <td>{{ $contact->company_name ?: '-' }}</td>
                    </tr>
                    <tr>
                        <td>Type(s)</td>
                        <td>
                            @forelse ($contact->types ?? [] as $type)
                                {{ str($type->value)->headline() }}{{ $loop->last ? '' : ', ' }}
                            @empty
                                -
                            @endforelse
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex flex-row gap-2 mt-4">
                <a href="/contacts">Terug naar overzicht</a>
                <a href="/contacts/{{ $contact->id }}/edit" class="ml-auto">Aanpassen</a>
            </div>
        </div>
    </section>

@endsection
