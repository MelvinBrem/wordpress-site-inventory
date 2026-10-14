<div>
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
                        @if ($hosting_provider->url)
                            <a href="{{ str($hosting_provider->url)->is('http*') ? $hosting_provider->url : 'https://' . $hosting_provider->url }}"
                                target="_blank">{{ $hosting_provider->url }}</a>
                        @endif
                    </td>
                    <td>{{ $hosting_provider->contact?->name }}</td>
                    @if ($preview !== 'true')
                        <td class="flex flex-col flex-wrap gap-x-2 w-fit">
                            <a href="/hosting-provider/{{ $hosting_provider->id }}">
                                Bekijken
                            </a>
                            <a href="/hosting-providers/{{ $hosting_provider->id }}/edit">
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
