<section class="section {{ $classes ?? '' }}">
    <div class="container mx-auto bg-paper p-4 border-3d border-stone">
        <div class="flex items-center relative pb-4 mb-4 border-b-2 border-silver">
            <h1 class="h2">
                {{ $title ?? 'Overzicht van contactpersonen' }}
            </h1>
            <a href="/create-contact" class="button ml-auto">
                Contactpersoon toevoegen
            </a>
        </div>

        <table class="border-stone border-3d">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    @if ($preview === 'true')
                        <th>...</th>
                    @endif
                    @if ($preview !== 'true')
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Types</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>
                            <a href="mailto:{{ $contact->email_address }}">{{ $contact->email_address }}</a>
                        </td>
                        <td>{{ $contact->company_name }}</td>
                        @if ($preview === 'true')
                            <td>...</td>
                        @endif
                        @if ($preview !== 'true')
                            <td>
                                <a href="tel:{{ $contact->phone_number }}">{{ $contact->phone_number }}</a>
                            </td>
                            <td>{{ $contact->address }}</td>
                            <td>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($contact->types as $type)
                                        <span class="badge badge--secondary">
                                            {{ str($type->value)->headline() }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($preview === 'true')
            <section class="section mt-4 border-t-2 border-silver pt-4">
                <div class="container mx-auto">
                    <a href="/contacts" class="button">
                        Bekijk alle contactpersonen
                    </a>
                </div>
            </section>
        @endif

    </div>
</section>
