<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div x-data="{ message: '{{ $chirp->message }}' }" class="card bg-slate-900 border border-slate-800 p-8 shadow-2xl">
            <h2 class="text-white text-2xl font-bold mb-6">Edit your Chirp</h2>
            
            <form method="POST" action="{{ route('chirps.update', $chirp) }}">
                @csrf
                @method('patch')
                
                <textarea
                    name="message"
                    x-model="message"
                    class="textarea textarea-ghost bg-slate-950 border-slate-700 text-slate-200 w-full h-32 focus:border-primary focus:ring-1 focus:ring-primary"
                ></textarea>

                <div class="flex justify-between items-center mt-4">
                    <span class="text-xs text-slate-500">
                        <span x-text="message.length"></span>/255
                    </span>
                    <div class="space-x-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-ghost text-slate-400">Cancel</a>
                        <button class="btn btn-primary" :disabled="message.length > 255">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
