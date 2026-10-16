@if ($errors->any())
    <div class="text-bronze text-bold text-sm mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/register">
    @csrf
    <div class="grid grid-cols-[max-content_minmax(0,1fr)] gap-2 items-center">
        <label for="name">Name<span class="text-bronze">*</span></label>
        <input type="text" id="name" name="name" placeholder="John Doe" maxlength="255"
            value="{{ old('name') }}" required>

        <label for="email">Email<span class="text-bronze">*</span></label>
        <input type="email" id="email" name="email" placeholder="johndoe@email.com" maxlength="255"
            value="{{ old('email') }}" required>

        <label for="password">Password<span class="text-bronze">*</span></label>
        <input type="password" id="password" name="password" placeholder="*********" required>

        <label for="password_confirmation">Confirm Password<span class="text-bronze">*</span></label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="*********" required>
    </div>

    <div class="flex flex-row gap-2 mt-2">
        <p class="text-sm text-gray-500">
            * verplicht veld
        </p>
        <button class="button ml-auto" type="submit">Registreren</button>
    </div>
</form>
