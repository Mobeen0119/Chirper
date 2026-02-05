<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-200 leading-tight">
            {{ __('Edit Chirp') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 mt-10">
        <div x-data="{ message: @js($chirp->message) }" class="card bg-slate-900 border border-slate-800 p-8 shadow-2xl backdrop-blur-xl">
            <form method="POST" action="{{ route('chirps.update', $chirp) }}">
                @csrf
                @method('patch')
                
                <label class="text-slate-400 text-sm mb-2 block uppercase tracking-widest font-bold">Your Message</label>
                
                <textarea
                    name="message"
                    x-model="message"
                    class="textarea textarea-ghost bg-slate-950 border-slate-700 text-slate-200 w-full h-40 text-lg focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all resize-none"
                    placeholder="Correct your thoughts..."
                >{{ old('message', $chirp->message) }}</textarea>

                <x-input-error :messages="$errors->get('message')" class="mt-2" />

                <div class="flex justify-between items-center mt-6">
                    <span class="text-xs font-mono" :class="message.length > 240 ? 'text-rose-500' : 'text-slate-500'">
                        <span x-text="message.length"></span>/255 characters
                    </span>
                    
                    <div class="flex items-center gap-4">
                        <a href="{{ route('dashboard') }}" class="text-slate-400 hover:text-white transition-colors text-sm">Cancel</a>
                        <button class="btn btn-primary px-8 rounded-full shadow-lg shadow-indigo-500/20" :disabled="message.length > 255 || message.length === 0">
                            Update Chirp ✨
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>