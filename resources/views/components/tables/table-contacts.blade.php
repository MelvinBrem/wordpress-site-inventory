<div>
    <table class="border-stone border-3d">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                @if ($preview !== 'true')
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Type(s)</th>
                    <th>Actions</th>
                @else
                    <th>...</th>
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
                    @if ($preview !== 'true')
                        <td>
                            <a href="tel:{{ $contact->phone_number }}">{{ $contact->phone_number }}</a>
                        </td>
                        <td class="max-w-100">{{ $contact->address }}</td>
                        <td>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($contact->types as $type)
                                    <span class="badge badge--secondary">
                                        {{ str($type->value)->headline() }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                        <td class="flex flex-col flex-wrap gap-x-2">
                            <a href="/contact/{{ $contact->id }}">
                                Bekijken
                            </a>
                            <a href="/contact/{{ $contact->id }}/update">
                                Aanpassen
                            </a>
                            <a href="/contact/{{ $contact->id }}/delete">
                                Verwijderen
                            </a>
                        </td>
                    @else
                        <td>...</td>
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
