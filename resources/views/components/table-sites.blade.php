<section class="section {{ $classes ?? '' }}">
    <div class="container mx-auto bg-paper p-4 border-3d border-stone">
        <div class="flex items-center relative pb-4 mb-4 border-b-2 border-silver">
            <h1 class="h2">
                {{ $title ?? 'Overzicht van sites' }}
            </h1>
            <a href="/create-site" class="button ml-auto">
                Site toevoegen
            </a>
        </div>

        <table class="border-stone border-3d">
            <thead>
                <tr>
                    <th>Label</th>
                    <th>URL</th>
                    <th>Hosting Provider</th>
                    @if ($preview === 'true')
                        <th>...</th>
                    @endif
                    @if ($preview !== 'true')
                        <th>Developer</th>
                        <th>Project Manager</th>
                        <th>Product Owner</th>
                        <th>Tags</th>
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
                        @if ($preview === 'true')
                            <td>...</td>
                        @endif

                        @if ($preview !== 'true')
                            <td>{{ $site->developer->name }}</td>
                            <td>{{ $site->projectManager->name }}</td>
                            <td>{{ $site->productOwner->name }}</td>
                            <td>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($site->tags as $tag)
                                        <span class="badge badge--secondary">
                                            {{ $tag->label }}
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
            <section class="section mt-4 pt-4 border-t-2 border-silver">
                <div class="container mx-auto">
                    <a href="/sites" class="button">
                        Bekijk alle sites
                    </a>
                </div>
            </section>
        @endif
    </div>
</section>
