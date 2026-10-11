<section class="section {{ $classes ?? '' }}">
    <div class="container mx-auto bg-paper p-4 border-3d border-stone">
        <div class="flex items-center relative pb-4 mb-4 border-b-2 border-silver">
            <h1 class="h2">
                {{ $title ?? 'Overzicht van hosting providers' }}
            </h1>
            <a href="/create-hosting-provider" class="button ml-auto">
                Hosting provider toevoegen
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="border-stone border-3d w-full">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>URL</th>
                        <th>Contactpersoon</th>
                        @if ($preview !== 'true')
                            <th>Actions</th>
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
                                <a href="{{ str($hosting_provider->url)->is('http*') ? $hosting_provider->url : 'https://' . $hosting_provider->url }}"
                                    target="_blank">{{ $hosting_provider->url }}</a>
                            </td>
                            <td>{{ $hosting_provider->contact?->name }}</td>
                            @if ($preview !== 'true')
                                <td class="flex flex-col flex-wrap gap-x-2">
                                    <a href="/hosting-provider/{{ $hosting_provider->id }}">
                                        Bekijken
                                    </a>
                                    <a href="/hosting-provider/{{ $hosting_provider->id }}/update">
                                        Aanpassen
                                    </a>
                                    <a href="/hosting-provider/{{ $hosting_provider->id }}/delete">
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
        </div>

        @if ($preview === 'true')
            <section class="section mt-4 pt-4 border-t-2 border-silver">
                <div class="container mx-auto">
                    <a href="/hosting-providers" class="button">
                        Bekijk alle hosting providers
                    </a>
                </div>
            </section>
        @endif
    </div>
</section>
