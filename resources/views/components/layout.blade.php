<!DOCTYPE html>
<html lang="en" class="bg-slate-950"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title . " - Chirper " : "Chirper" }}</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #020617; }
        html { scroll-behavior: smooth; }
    </style>
</head>

<body class="bg-slate-950 min-h-screen flex flex-col text-slate-200">

    <div class="navbar bg-slate-900/50 backdrop-blur-lg border-b border-slate-800 sticky top-0 z-50 px-8">
        <div class="flex-1">
            <a href="/" class="text-2xl font-black text-white tracking-tighter cursor-pointer">
                CHIRPER<span class="text-indigo-500">.</span>
            </a>
        </div>
        <div class="flex-none gap-4">
            <a href="/login" class="text-sm font-bold hover:text-indigo-400 transition-colors">Login</a>
            <a href="/register" class="btn btn-primary btn-sm rounded-full px-6 shadow-lg shadow-indigo-500/20">Get Started</a>
        </div>
    </div>

    <main class="grow w-full">
        {{ $slot }}
    </main>

    <footer class="footer items-center p-10 bg-slate-950 text-slate-500 border-t border-slate-900 mt-20">
        <div class="items-center grid-flow-col">
            <div class="text-indigo-500 font-bold text-xl mr-4 uppercase tracking-widest">Chirp</div>
            <p>© 2026 — Built with Laravel</p>
        </div> 
\
    </footer>

</body>
</html>