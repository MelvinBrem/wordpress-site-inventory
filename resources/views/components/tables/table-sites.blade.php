<div>
    <table class="border-stone border-3d w-full">
        <thead>
            <tr>
                <th>Label</th>
                <th>URL</th>
                <th>Hosting Provider</th>
                <th>Developer</th>
                <th>Project Manager</th>
                <th>Product Owner</th>
                @if ($preview !== 'true')
                    <th>Tag(s)</th>
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
                    <td>
                        @if ($site->hostingProvider)
                            <a
                                href="/hosting-providers/{{ $site->hostingProvider->id }}">{{ $site->hostingProvider->label }}</a>
                        @else
                            -
                        @endif
                    </td>

                    <td>
                        @if ($site->developer)
                            <a href="/contacts/{{ $site->developer->id }}">{{ $site->developer->name }}</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($site->projectManager)
                            <a href="/contacts/{{ $site->projectManager->id }}">{{ $site->projectManager->name }}</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($site->productOwner)
                            <a href="/contacts/{{ $site->productOwner->id }}">{{ $site->productOwner->name }}</a>
                        @else
                            -
                        @endif
                    </td>
                    @if ($preview !== 'true')
                        <td>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($site->tags as $tag)
                                    {{ $tag->label }}{{ $loop->last ? '' : ', ' }}
                                @endforeach
                            </div>
                        </td>
                        <td class="flex flex-col flex-wrap gap-x-2">
                            <a href="/sites/{{ $site->id }}">
                                Bekijken
                            </a>
                            <a href="/sites/{{ $site->id }}/edit">
                                Aanpassen
                            </a>
                            <form action="/sites/{{ $site->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Weet je zeker dat je deze site wilt verwijderen?')">
                                    Verwijderen
                                </button>
                            </form>
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
            <div class="container mx-auto flex flex-row justify-between">
                <a href="/sites" class="button">
                    Bekijk alle sites
                </a>
                <a href="/sites/create" class="button">
                    Site aanmaken
                </a>
            </div>
        </section>
    @endif
</div>
