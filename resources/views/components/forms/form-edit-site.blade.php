@if ($errors->any())
    <div class="text-bronze text-bold text-sm mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/sites/{{ $site->id }}/edit">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-[max-content_minmax(0,1fr)] gap-2 items-center">
        <label for="label">Label<span class="text-bronze">*</span></label>
        <input type="text" id="label" name="label" placeholder="Lorem-ipsum" maxlength="255"
            value="{{ old('label', $site->label) }}" required>

        <label for="url">URL<span class="text-bronze">*</span></label>
        <input type="text" id="url" name="url" placeholder="https://lorem-ipsum.com" maxlength="255"
            value="{{ old('url', $site->url) }}">

        <label for="hosting_provider_id">Hosting provider<span class="text-bronze">*</span></label>
        <select id="hosting_provider_id" name="hosting_provider_id" placeholder="Hosting Provider" maxlength="255">
            <option value="" disabled>
                - Kies een Hosting provider -
            </option>
            @foreach ($hosting_providers as $hosting_provider)
                <option value="{{ $hosting_provider->id }}" @selected(old('hosting_provider_id', $site->hosting_provider_id) == $hosting_provider->id)>
                    {{ $hosting_provider->label }}
                </option>
            @endforeach
        </select>

        <label for="product_owner_contact_id">Product Owner<span class="text-bronze">*</span></label>
        <select id="product_owner_contact_id" name="product_owner_contact_id" placeholder="Product Owner">
            <option value="" disabled>
                - Kies een Product Owner -
            </option>
            @foreach ($product_owner_contacts as $contact)
                <option value="{{ $contact->id }}" @selected(old('product_owner_contact_id', $site->product_owner_contact_id) == $contact->id)>
                    {{ $contact->name }}
                </option>
            @endforeach
        </select>

        <label for="developer_contact_id">Developer<span class="text-bronze">*</span></label>
        <select id="developer_contact_id" name="developer_contact_id" placeholder="Developer" maxlength="255">
            <option value="" selected disabled>
                - Kies een Developer -
            </option>
            @foreach ($developer_contacts as $contact)
                <option value="{{ $contact->id }}" @selected(old('developer_contact_id', $site->developer_contact_id) == $contact->id)>
                    {{ $contact->name }}
                </option>
            @endforeach
        </select>

        <label for="project_manager_contact_id">Project manager<span class="text-bronze">*</span></label>
        <select id="project_manager_contact_id" name="project_manager_contact_id" placeholder="Project manager"
            maxlength="255">
            <option value="" selected disabled>
                - Kies een Project manager -
            </option>
            @foreach ($project_manager_contacts as $contact)
                <option value="{{ $contact->id }}" @selected(old('project_manager_contact_id', $site->project_manager_contact_id) == $contact->id)>
                    {{ $contact->name }}
                </option>
            @endforeach
        </select>

        <label for="site_tags">Tag(s)</label>
        <select id="tags" name="tags[]" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags', $site->tags->pluck('id')->all())))>
                    {{ $tag->label }}
                </option>
            @endforeach
        </select>

        <label for="notes">Notities</label>
        <textarea name="notes" id="notes">{{ old('notes', $site->notes) }}</textarea>
    </div>

    <div class="flex flex-row gap-2 mt-2">
        <p class="text-sm text-gray-500">
            * verplicht veld
        </p>
        <button class="button ml-auto" type="submit">Site aanpassen</button>
    </div>
</form>
