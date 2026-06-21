<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Undangan Pernikahan Digital" />
    <title>@yield('title', 'Undangan Pernikahan')</title>
   <link rel="stylesheet" href="/build/assets/app-BJpMmGN8.css">
<script src="/build/assets/app-CfPgf_5X.js" defer></script>
</head>
<body>
    @yield('content')

    {{-- Tombol musik --}}
    <button id="music-btn" aria-label="Toggle musik">
        <span id="music-icon">
            {{-- Play icon default --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="20" height="20">
                <path d="M8 5v14l11-7z"/>
            </svg>
        </span>
    </button>
</body>
</html>