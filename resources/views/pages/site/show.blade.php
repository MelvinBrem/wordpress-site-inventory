@extends('layouts.app')

@section('title', $site->label . ' | ' . config('app.name'))

@section('content')

    <section class="section">
        <div class="container max-w-150 mx-auto bg-paper p-4 border-stone border-3d">
            <h1 class="h1 mb-4 text-center w-full">{{ $site->label }}</h1>

            <table class="details border-stone border-3d">
                <tbody>
                    <tr>
                        <td>Label</td>
                        <td>{{ $site->label }}</td>
                    </tr>
                    <tr>
                        <td>URL</td>
                        <td>
                            <a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Hosting provider</td>
                        <td>
                            @if ($site->hostingProvider)
                                <a
                                    href="/hosting-providers/{{ $site->hostingProvider->id }}">{{ $site->hostingProvider->label }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Product Owner</td>
                        <td>
                            @if ($site->productOwner)
                                <a href="/contacts/{{ $site->productOwner->id }}">{{ $site->productOwner->name }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Developer</td>
                        <td>
                            @if ($site->developer)
                                <a href="/contacts/{{ $site->developer->id }}">{{ $site->developer->name }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Project manager</td>
                        <td>
                            @if ($site->projectManager)
                                <a href="/contacts/{{ $site->projectManager->id }}">{{ $site->projectManager->name }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Tag(s)</td>
                        <td>
                            @forelse ($site->tags as $tag)
                                {{ $tag->label }}{{ $loop->last ? '' : ', ' }}
                            @empty
                                -
                            @endforelse
                        </td>
                    </tr>
                    <tr>
                        <td>Notities</td>
                        <td class="whitespace-pre-wrap">{{ $site->notes ?: '-' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex flex-row gap-2 mt-4 pt-4 border-t border-silver">
                <a href="/sites">Terug naar overzicht</a>
                <a href="/sites/{{ $site->id }}/edit" class="ml-auto">Aanpassen</a>
            </div>
        </div>
    </section>

@endsection
