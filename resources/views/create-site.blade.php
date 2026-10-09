@extends('layouts.app')

@section('title', 'Home | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto">
            <p>Site aanmaken</p>
            <form method="POST" action="/create-site" class="bg-primary flex flex-col gap-2 p-2">
                @csrf
                <input type="text" id="label" name="label" placeholder="Label" maxlength="255" value="test" required>

                <input type="text" id="url" name="url" placeholder="URL" maxlength="255"
                    value="https://test.com" required>

                <select type="hosting_provider_id" id="hosting_provider_id" name="hosting_provider_id"
                    placeholder="Hosting Provider" maxlength="255" required>
                    <option value="">
                        - Kies een Hosting provider -
                    </option>
                    @foreach ($hosting_providers as $hosting_provider)
                        <option value="{{ $hosting_provider->id }}">
                            {{ $hosting_provider->label }}
                        </option>
                    @endforeach
                </select>

                <select type="product_owner_contact_id" id="product_owner_contact_id" name="product_owner_contact_id"
                    placeholder="Product Owner" required>
                    <option value="">
                        - Kies een Product Owner -
                    </option>
                    @foreach ($product_owner_contacts as $contact)
                        <option value="{{ $contact->id }}">
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>

                <select type="developer_contact_id" id="developer_contact_id" name="Developer" placeholder="Developer"
                    maxlength="255" required>
                    <option value="">
                        - Kies een Developer -
                    </option>
                    @foreach ($developer_contacts as $contact)
                        <option value="{{ $contact->id }}">
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>

                <select type="project_manager_contact_id" id="project_manager_contact_id" name="project_manager_contact_id"
                    placeholder="Project manager" maxlength="255">
                    <option value="">
                        - Kies een Project manager -
                    </option>
                    @foreach ($project_manager_contacts as $contact)
                        <option value="{{ $contact->id }}">
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>

                <button class="button" type="submit">Aanmaken</button>
            </form>
        </div>
    </section>
@endsection
