@extends('layouts.app')

@section('title', 'Home | ' . config('app.name'))

@section('content')
    <section class="section">
        <div class="container mx-auto bg-white rounded shadow p-4">
            <table
                class="w-full border-collapse text-left rounded text-sm [&_th]:border [&_td]:border [&_th]:border-primary [&_td]:border-primary [&_th]:px-2 [&_td]:px-2 [&_th]:py-1 [&_td]:py-1">
                <tr>
                    <th>Label</th>
                    <th>URL</th>
                    <th>Hosting Provider</th>
                    <th>Developer</th>
                    <th>Project Manager</th>x
                    <th>Product Owner</th>
                    <th>Tags</th>
                </tr>
                @foreach ($sites as $site)
                    <tr>
                        <td>{{ $site['label'] }}</td>
                        <td>
                            <a href="{{ $site['url'] }}">{{ $site['url'] }}</a>
                        </td>
                        <td>{{ $site->hostingProvider->label }}</td>
                        <td>{{ $site->developer->name }}</td>
                        <td>{{ $site->projectManager->name }}</td>
                        <td>{{ $site->productOwner->name }}</td>
                        <td>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($site->tags as $tag)
                                    <span class="badge-primary">
                                        {{ $tag->label }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
