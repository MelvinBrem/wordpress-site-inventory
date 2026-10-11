<section class="section">
    <div class="container max-w-100 mx-auto bg-paper p-4 border-stone border-3d">
        <h2 class="h2 mb-4 text-center w-full">Site aanmaken</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/create-site" class="flex flex-col gap-2">
            @csrf
            <input type="text" id="label" name="label" placeholder="Label" maxlength="255" value="Test">

            <input type="text" id="url" name="url" placeholder="URL" maxlength="255"
                value="https://test.com">

            <select type="hosting_provider_id" id="hosting_provider_id" name="hosting_provider_id"
                placeholder="Hosting Provider" maxlength="255">
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
                placeholder="Product Owner">
                <option value="">
                    - Kies een Product Owner -
                </option>
                @foreach ($product_owner_contacts as $contact)
                    <option value="{{ $contact->id }}">
                        {{ $contact->name }}
                    </option>
                @endforeach
            </select>

            <select type="developer_contact_id" id="developer_contact_id" name="developer_contact_id"
                placeholder="Developer" maxlength="255">
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

            <button class="button" type="submit">Site aanmaken</button>
        </form>
    </div>
</section>
