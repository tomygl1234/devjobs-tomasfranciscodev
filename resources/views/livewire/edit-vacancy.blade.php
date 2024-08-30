<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='editVacancy'>

    <!-- Vacancy title -->
    <div>
        <x-input-label for="title" :value="__('Vacancy Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" />
        @error('title')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>
    <!-- Vacancy Monthly Salary -->

    <div>
        <x-input-label for="salary" :value="__('Monthly Salary')" />
        <select wire:model="salary" id="salary"
            class="rounded-md shadow-sm text-black border-gray-300 focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50 w-full text-center">
            <option>-- Select the monthly salary --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>
        @error('salary')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <!-- Vacancy Category -->

    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select wire:model="category" id="category"
            class="rounded-md shadow-sm text-black border-gray-300 focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50 w-full text-center">
            <option>-- Select the vacancy category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        </select>
        @error('category')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <!-- Vacancy Company -->

    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Enter company name, ej: Netflix, Uber, Shopify, Facebook..." />
        @error('company')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <!-- Vacancy Last day for apply -->

    <div>
        <x-input-label for="last_day" :value="__('Last day for apply')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day"
            :value="old('last_day')" />
        @error('last_day')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <!-- Vacancy Category -->

    <div>
        <x-input-label for="description" :value="__('Vacancy Description')" />
        <textarea wire:model="description"
            class="rounded-md shadow-sm text-black border-gray-300 focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50 w-full h-52"
            id="description">

       </textarea>
        @error('description')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <!-- Vacancy Image -->

    <div>
        <x-input-label for="image" :value="__('Vacancy image')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="new_image" accept="image/*" />

        {{-- Two way data Bndg --}}
        <div class="my-5 w-80">
            @if ($new_image)
                Selected image:
                <img src="{{ $new_image->temporaryUrl() }}" alt="{{ 'Vacancy Image' . $title }}">
            @endif
        </div>

        <div class="my-5 w-80">
            <x-input-label for="image" :value="__('Actual Image')" />
            <img src="{{ asset('storage/vacancies/' . $image) }}" alt="{{ 'Vacancy Image' . $title }}">
        </div>

        @error('new_image')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <x-primary-button>
        {{ __('Save Vacancy') }}
    </x-primary-button>
</form>
