@if ($errors->any())
    <div class="text-bronze text-bold text-sm mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/hosting-providers/{{ $hosting_provider->id }}/edit">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-[max-content_minmax(0,1fr)] gap-2 items-center">
        <label for="label">Label<span class="text-bronze">*</span></label>
        <input type="text" id="label" name="label" placeholder="Lorem Ipsum Hosting" maxlength="255"
            value="{{ old('label', $hosting_provider->label) }}" required>

        <label for="url">URL</label>
        <input type="text" id="url" name="url" placeholder="https://lorem-ipsum.com" maxlength="255"
            value="{{ old('url', $hosting_provider->url) }}">

        <label for="contact_id">Contactpersoon</label>
        <select id="contact_id" name="contact_id">
            <option value="" @selected(old('contact_id', $hosting_provider->contact_id) == '')>
                - Kies een contactpersoon -
            </option>
            @foreach ($contacts as $contact)
                <option value="{{ $contact->id }}" @selected(old('contact_id', $hosting_provider->contact_id) == $contact->id)>
                    {{ $contact->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex flex-row gap-2 mt-2">
        <p class="text-sm text-gray-500">
            * verplicht veld
        </p>
        <button class="button ml-auto" type="submit">Hosting provider aanpassen</button>
    </div>
</form>
