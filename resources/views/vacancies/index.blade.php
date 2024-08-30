<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My vacancies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="uppercase border-l-4 border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3">
                    {{session('message')}}   
                </div>  
            @endif
            <livewire:show-vacancies />
        </div>
    </div>
</x-app-layout>
