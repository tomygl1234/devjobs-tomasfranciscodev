<div class="bg-gray-100 dark:bg-gray-700 border-4 p-5 mt-10 flex flex-col justify-center items-center">

    <h3 class="text-center text-2xl font-bold my-4 dark:text-gray-300">Postulate to this vacancy</h3>
    @if (session()->has('message'))
        <p class="uppercase border-l-4 border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm">
            {{ session('message') }}
        </p>
    @else
        <form wire:submit.prevent='postulate' class="w-96 mt-5">

            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum Vitae (PDF)')" />
                <x-text-input id="cv" type="file" accept=".pdf" wire:model="cv" />

            </div>
            @error('cv')
                <livewire:show-alert :message="$message" />
            @enderror
            <x-primary-button class="my-5">
                Postulate
            </x-primary-button>
        </form>
    @endif

</div>
