<div>
    <table class="border-stone border-3d w-full">
        <thead>
            <tr>
                <th>Label</th>
                <th>URL</th>
                <th>Hosting Provider</th>

                @if ($preview !== 'true')
                    <th>Developer</th>
                    <th>Project Manager</th>
                    <th>Product Owner</th>
                    <th>Tags</th>
                    <th>Actions</th>
                @else
                    <th>...</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($sites as $site)
                <tr>
                    <td>{{ $site['label'] }}</td>
                    <td>
                        <a href="{{ $site['url'] }}" target="_blank">{{ $site['url'] }}</a>
                    </td>
                    <td>{{ $site->hostingProvider->label }}</td>

                    @if ($preview !== 'true')
                        <td>{{ $site->developer->name }}</td>
                        <td>{{ $site->projectManager->name }}</td>
                        <td>{{ $site->productOwner->name }}</td>
                        <td>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($site->tags as $tag)
                                    {{ $tag->label }}{{ $loop->last ? '' : ', ' }}
                                @endforeach
                            </div>
                        </td>
                        <td class="flex flex-col flex-wrap gap-x-2">
                            <a href="/site/{{ $site->id }}">
                                Bekijken
                            </a>
                            <a href="/site/{{ $site->id }}/update">
                                Aanpassen
                            </a>
                            <a href="/site/{{ $site->id }}/delete">
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
                <a href="/sites" class="button">
                    Bekijk alle sites
                </a>
            </div>
        </section>
    @endif
</div>
