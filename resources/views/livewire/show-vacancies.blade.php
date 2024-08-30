<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacancies as $vacancy)
        <div class="p-6 border-b text-gray-600 dark:text-gray-100 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="{{route('vacancies.show', $vacancy->id)}}" class="text-xl font-bold">
                    {{ $vacancy->title }}
                </a>
                <p class="text-sm text-gray-600 font-bold dark:text-gray-300">Company: {{ $vacancy->company }}</p>
                <p class="text-sm text-gray-600 font-bold dark:text-gray-200">Last day for apply:
                    {{ $vacancy->last_day->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-col items-stretch md:flex-row gap-3  mt-5 md:mt-0">
                <a href="{{route('candidates.index', $vacancy)}}"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center dark:bg-indigo-600">
                    Candidates
                </a>
                <a href="{{ route('vacancies.edit', $vacancy->id) }}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center dark:bg-yellow-500">
                    Edit
                </a>
                <button wire:click="$emit('showAlert', {{$vacancy->id}})"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Delete
                </button>
            </div>
        </div>

    @empty
        <p class="mt-10 p-3 text-center text-sm text-gray-600 dark:text-gray-200"> There are no vacancies posted yet</p>
    @endforelse
    <div class="mt-10">
        {{ $vacancies->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('showAlert', vacancyId =>{
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Delete the vacancy
                Livewire.emit('deleteVacancy', vacancyId);
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
        })
       
    </script>
@endpush
