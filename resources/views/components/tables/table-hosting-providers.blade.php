<div>
    <table class="border-stone border-3d w-full">
        <thead>
            <tr>
                <th>Label</th>
                <th>URL</th>
                <th>Contactpersoon</th>
                @if ($preview !== 'true')
                    @auth
                        <th>Acties</th>
                    @endauth
                @else
                    <th>...</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($hosting_providers as $hosting_provider)
                <tr>
                    <td>{{ $hosting_provider->label }}</td>
                    <td>
                        @if ($hosting_provider->url)
                            <a href="{{ str($hosting_provider->url)->is('http*') ? $hosting_provider->url : 'https://' . $hosting_provider->url }}"
                                target="_blank">{{ $hosting_provider->url }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($hosting_provider->contact)
                            <a
                                href="/contacts/{{ $hosting_provider->contact->id }}">{{ $hosting_provider->contact->name }}</a>
                        @else
                            -
                        @endif
                    </td>
                    @if ($preview !== 'true')
                        @auth
                            <td class="flex flex-col flex-wrap gap-x-2 w-fit">
                                <a href="/hosting-providers/{{ $hosting_provider->id }}">
                                    Bekijken
                                </a>
                                <a href="/hosting-providers/{{ $hosting_provider->id }}/edit">
                                    Aanpassen
                                </a>
                                <form action="/hosting-providers/{{ $hosting_provider->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Weet je zeker dat je deze hosting provider wilt verwijderen?')">
                                        Verwijderen
                                    </button>
                                </form>
                            </td>
                        @endauth
                    @else
                        <td>...</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($preview === 'true')
        <section class="section mt-4 pt-4 border-t-2 border-silver">
            <div class="container mx-auto flex flex-row justify-between">
                <a href="/hosting-providers" class="button">
                    Bekijk alle hosting providers
                </a>
                <a href="/hosting-providers/create" class="button">
                    Hosting provider aanmaken
                </a>
            </div>
        </section>
    @endif
</div>
