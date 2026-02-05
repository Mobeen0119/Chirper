<x-layouts.app>
    <x-slot:title>Chirper | Dashboard</x-slot:title>

    <div class="w-full min-h-screen bg-slate-950 py-12 px-4 sm:px-6 lg:px-8">
        
        <header class="max-w-4xl mx-auto text-center mb-12">
            <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl">
                Chirp <span class="text-indigo-500">Away</span>
            </h1>
            <p class="mt-3 text-xl text-slate-400 font-light italic">"Speak your mind, change the world."</p>
        </header>

        <div x-data="{ message: '' }" class="max-w-2xl mx-auto mb-16 animate-in">
            <div class="card bg-slate-900/40 border border-slate-800 shadow-2xl backdrop-blur-xl">
                <form method="POST" action="{{ route('chirps.store') }}" class="card-body p-8">
                    @csrf
                    <textarea 
                        name="message" 
                        x-model="message"
                        class="textarea textarea-ghost bg-slate-950/50 border-slate-700 focus:border-indigo-500 text-slate-200 text-lg w-full h-32 focus:ring-2 focus:ring-indigo-500/20 transition-all resize-none" 
                        placeholder="What's on your mind?"></textarea>
                    
                    <div class="flex justify-between items-center mt-6">
                        <span class="text-xs font-mono transition-colors" 
                              :class="message.length > 240 ? 'text-rose-500 font-bold' : 'text-slate-500'">
                            <span x-text="message.length">0</span>/255 characters
                        </span>
                        
                        <button class="btn btn-primary px-10 rounded-full shadow-lg shadow-indigo-500/20 hover:scale-105 active:scale-95 transition-all disabled:opacity-50 disabled:grayscale" 
                                :disabled="message.length > 255 || message.length === 0">
                            Chirp 🚀
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($chirps as $chirp)
                    <article class="group relative bg-slate-900 border border-slate-800 p-6 rounded-2xl hover:border-indigo-500/50 transition-all duration-500 hover:-translate-y-2 animate-in">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl blur opacity-0 group-hover:opacity-10 transition duration-500"></div>
                        
                        <div class="relative flex flex-col h-full">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-lg">
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

                            @if ($chirp->user->is(auth()->user()))
                                <div class="mt-6 pt-4 border-t border-slate-800/50 flex justify-end items-center gap-4">
                                    <a href="{{ route('chirps.edit', $chirp) }}" class="text-slate-500 hover:text-indigo-400 transition-colors tooltip" data-tip="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-slate-500 hover:text-rose-500 transition-colors tooltip" data-tip="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
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
            animation: enter 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
    </style>
</x-layouts.app>