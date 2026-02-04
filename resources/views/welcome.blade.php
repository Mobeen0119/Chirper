<!DOCTYPE html>
<html lang="en" class="bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Chirper' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-200 antialiased min-h-screen">
    <nav class="border-b border-slate-800 bg-slate-900/50 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <span class="text-xl font-bold tracking-tighter text-white">CHIRPER<span class="text-primary">.</span></span>
            <div class="flex gap-4">
                <a href="/" class="text-sm font-medium hover:text-primary transition-colors">Home</a>
                </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>
</body>
</html>