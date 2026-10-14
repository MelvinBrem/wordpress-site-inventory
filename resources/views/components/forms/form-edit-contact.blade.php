@if ($errors->any())
    <div class="text-bronze text-bold text-sm mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $selectedTypes = old('types', $contact->types?->map(fn ($type) => $type->value)->all() ?? []);
@endphp

<form method="POST" action="/contacts/{{ $contact->id }}/edit">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-[max-content_minmax(0,1fr)] gap-2 items-center">
        <label for="name">Name<span class="text-bronze">*</span></label>
        <input type="text" id="name" name="name" placeholder="John Doe" maxlength="255"
            value="{{ old('name', $contact->name) }}" required>

        <label for="email_address">Email Address<span class="text-bronze">*</span></label>
        <input type="text" id="email_address" name="email_address" placeholder="john.doe@example.com" maxlength="255"
            value="{{ old('email_address', $contact->email_address) }}">

        <label for="phone_number">Phone Number<span class="text-bronze">*</span></label>
        <input type="text" id="phone_number" name="phone_number" placeholder="+31 612345678" maxlength="255"
            value="{{ old('phone_number', $contact->phone_number) }}">

        <label for="address">Address<span class="text-bronze">*</span></label>
        <input type="text" id="address" name="address" placeholder="Straatnaam 123, 1234 AB, Stad" maxlength="255"
            value="{{ old('address', $contact->address) }}">

        <label for="company_name">Company Name<span class="text-bronze">*</span></label>
        <input type="text" id="company_name" name="company_name" placeholder="Lorem Ipsum" maxlength="255"
            value="{{ old('company_name', $contact->company_name) }}">

        <label for="types">Type(s)<span class="text-bronze">*</span></label>
        <select id="types" name="types[]" multiple>
            @foreach (\App\Enums\ContactType::cases() as $type)
                <option value="{{ $type->value }}" @selected(in_array($type->value, $selectedTypes, true))>
                    {{ str($type->value)->headline() }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex flex-row gap-2 mt-2">
        <p class="text-sm text-gray-500">
            * verplicht veld
        </p>
        <button class="button ml-auto" type="submit">Contactpersoon aanpassen</button>
    </div>
</form>
