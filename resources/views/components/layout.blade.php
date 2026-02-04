<!DOCTYPE html>
<html lang="en" data-theme=""> <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{isset($title) ?$title ."- Chirper ": "Chirper"}}</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.6.0/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Nunito', sans-serif; }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex flex-col">

    <div class="navbar bg-base-100 shadow-md px-8">
        <div class="flex-1">
            <a class="text-2xl font-bold text-indigo-600 tracking-tight">Chirper</a>
        </div>
        <div class="flex-none gap-2">
            <a href="/login" class="btn btn-ghost">Login</a>
            <a href="/register" class="btn btn-primary">Get Started</a>
        </div>
    </div>

    <main class="grow flex items-center justify-center py-20">
 {{$slot}}
    </main>

    <footer class="footer items-center p-8 bg-slate-900 text-slate-400">
        <div class="items-center grid-flow-col">
            <p>© 2026 Chirper App — Built with Laravel</p>
        </div> 
        <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end text-sm">
            <a class="link link-hover">Privacy</a>
            <a class="link link-hover">Terms</a>
            <a class="link link-hover">Help</a>
        </div>
    </footer>

</body>
</html> 