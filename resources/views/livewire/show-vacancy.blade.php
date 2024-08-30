<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-300 my-3">
            {{ $vacancy->title }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-700 p-4 my-10 border-r-4 border-l-4">
            <p class="font-bold text-sm uppercase text-gray-600 dark:text-gray-100 my-3">Company:
                <span class="normal-case font-normal">{{ $vacancy->company }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-600 dark:text-gray-100 my-3">Last day for apply:
                <span class="normal-case font-normal">{{ $vacancy->last_day->toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-600 dark:text-gray-100 my-3">Category:
                <span class="normal-case font-normal">{{ $vacancy->category->category }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-600 dark:text-gray-100 my-3">Salary:
                <span class="normal-case font-normal">{{ $vacancy->salary->salary }}</span>
            </p>

        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacancies/' . $vacancy->image) }}"
                alt="{{ 'Vacancy image from:' . ' ' . $vacancy->title }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5 text-gray-800 dark:text-gray-100 ">Job Description</h2>
            <p class="text-gray-600 dark:text-gray-300">{{ $vacancy->description }}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-50 dark:bg-gray-700 border-r-4 border-l-4 p-5 text-center">
            <p class="font-bold text-sm uppercase dark:text-gray-200 my-3">
                ¿Would you like to apply to this vacancy? -> <a href="{{ route('register') }}"
                    class="text-indigo-600 dark:text-gray-100">Register now and get acces to this and others vacancies</a>
            </p>
        </div>
    @endguest
    @cannot('create', App\Models\Vacancy::class)
       <livewire:postulate-vacancy :vacancy="$vacancy" />
    @endcannot
</div>
