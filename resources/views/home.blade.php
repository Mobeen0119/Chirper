<x-layout>
    <x-slot:title>Chirper | Dashboard</x-slot:title>

    <div class="w-full min-h-screen bg-slate-950 py-12 px-4 sm:px-6 lg:px-8">
        
        <header class="max-w-4xl mx-auto text-center mb-12">
            <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl">
                Chirp <span class="text-primary">Away</span>
            </h1>
            <p class="mt-3 text-xl text-slate-400">Speak from mind</p>
        </header>

        <div class="max-w-2xl mx-auto mb-16 animate-in fade-in slide-in-from-top-4 duration-1000">
            <div class="card bg-slate-900/50 border border-slate-800 shadow-2xl backdrop-blur-xl">
                <form method="POST" action="/chirps" class="card-body p-8">
                    @csrf
    
                    <textarea 
                        name="message" 
                        class="textarea textarea-ghost bg-slate-950/50 border-slate-700 focus:border-primary text-slate-200 text-lg w-full h-32 focus:ring-2 focus:ring-primary/20 transition-all" 
                        placeholder="What's on your mind?"></textarea>
                    
                    <div class="flex justify-between items-center mt-6">
                        <span class="text-xs text-slate-500 font-mono">Max 255 chars</span>
                        <button class="btn btn-primary px-10 rounded-full shadow-lg shadow-primary/30 hover:scale-105 active:scale-95 transition-all">
                            Post Chirp 🚀
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($chirps as $chirp)
                    <article class="group relative bg-slate-900 border border-slate-800 p-6 rounded-2xl hover:border-primary/50 transition-all duration-500 hover:-translate-y-2 animate-in fade-in zoom-in-95">
                        <div class="absolute -inset-0.5 bg-linear-to-r from-primary to-blue-600 rounded-2xl blur opacity-0 group-hover:opacity-10 transition duration-500"></div>
                        
                        <div class="relative flex flex-col h-full">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-linear-to-br from-primary to-blue-500 flex items-center justify-center text-white font-bold">
                                    {{ substr($chirp->user->name ?? 'U', 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="text-slate-200 font-semibold">{{ $chirp->user->name ?? 'Anonymous' }}</h4>
                                    <p class="text-[10px] text-slate-500 uppercase tracking-widest">{{ $chirp->created_at->diffForHumans() }}</p>
                                </div>
                            </div>

                            <p class="text-slate-300 text-lg leading-relaxed grow">
                                {{ $chirp->message }}
                            </p>

<div class="mt-6 pt-4 border-t border-slate-800/50 flex justify-end">
    <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
        @csrf
        @method('delete')
        <button type="submit" class="text-slate-600 hover:text-red-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    </form>
</div>                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        @keyframes enter {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in {
            animation: enter 0.7s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
    </style>
</x-layout>