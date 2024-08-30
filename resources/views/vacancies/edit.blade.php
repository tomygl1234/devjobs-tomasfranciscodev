<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Vacancy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl font-bold text-center bm-10">Edit vacancy: {{$vacancy->title}}</h1>
                    
                    <div class="md:flex md:justify-center p-5">
                        
                        <livewire:edit-vacancy :vacancy="$vacancy" />

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
