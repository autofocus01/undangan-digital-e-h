<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login — Undangan Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: var(--cream); min-height: 100svh; display: flex; align-items: center; justify-content: center;">

<div class="w-full max-w-sm mx-auto px-6">

    <div class="text-center mb-8">
        <p class="font-display text-3xl font-light" style="color: var(--brown);">Admin Panel</p>
        <p class="text-xs tracking-widest uppercase mt-1" style="color: var(--sage);">Undangan Digital</p>
    </div>

    <div class="card p-8">
        @if(session('error'))
            <div class="mb-4 p-3 rounded-lg text-sm text-center" style="background: rgba(200,80,80,0.08); color: #c05050; border: 1px solid rgba(200,80,80,0.2);">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="form-label" for="password">Password Admin</label>
                <input type="password" id="password" name="password"
                       class="form-input @error('password') border-red-400 @enderror"
                       placeholder="Masukkan password" autofocus />
                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full py-3 text-white text-xs tracking-widest uppercase rounded-lg transition-colors"
                    style="background: var(--gold);"
                    onmouseover="this.style.background='var(--brown)';"
                    onmouseout="this.style.background='var(--gold)';">
                Masuk
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('invitation') }}" class="text-xs" style="color: var(--sage);">
                ← Kembali ke undangan
            </a>
        </div>
    </div>
</div>

</body>
</html>