<header class="my-4">
    <div class="bg-paper container mx-auto p-4 border-stone border-3d flex items-center justify-between">
        <a href="/" class="font-bold hover:underline">
            {{ config('app.name') }}
        </a>
        <div class="flex items-center space-x-2">
            <a href="/sites" class="button">
                Sites
            </a>
            <a href="/contacts" class="button">
                Contactpersonen
            </a>
            <a href="/hosting-providers" class="button">
                Hosting providers
            </a>
        </div>

        @auth
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500 mr-2">
                    {{ auth()->user()->name }} | {{ auth()->user()->email }}
                </span>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button">
                        Uitloggen
                    </button>
                </form>
            </div>
        @else
            <div class="flex items-center space-x-2">
                <a href="{{ route('auth.register') }}" class="button">
                    Registreren
                </a>
                <a href="{{ route('auth.login') }}" class="button">
                    Login
                </a>
            </div>
        @endauth
    </div>
</header>

@if (session('message'))
    <section class="section">
        <div class="container mx-auto p-4 bg-sand border-3d border-umber my-4">
            {{ session('message') }}
        </div>
    </section>
@endif
