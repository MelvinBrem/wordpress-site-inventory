@if ($errors->any())
    <div class="text-bronze text-bold text-sm mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/login">
    @csrf
    <div class="grid grid-cols-[max-content_minmax(0,1fr)] gap-2 items-center">
        <label for="email">Email<span class="text-bronze">*</span></label>
        <input type="email" id="email" name="email" placeholder="john.doe@example.com" maxlength="255"
            value="{{ old('email') }}" required autofocus>

        <label for="password">Password<span class="text-bronze">*</span></label>
        <input type="password" id="password" name="password" placeholder="*********" required>

        <label for="remember">Remember me</label>
        <input type="checkbox" id="remember" name="remember" value="1" class="!w-auto justify-self-start"
            @checked(old('remember'))>
    </div>

    <div class="flex flex-row gap-2 mt-2">
        <p class="text-sm text-gray-500">
            * verplicht veld
        </p>
        <button class="button ml-auto" type="submit">Login</button>
    </div>
</form>
