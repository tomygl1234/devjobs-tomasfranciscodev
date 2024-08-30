<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl font-bold text-center bm-10">My Notifications</h1>
                    @forelse ($notifications as $notification)
                        <div class="mt-5 p-5 border border-l-4 border-r-4 border-gray-200 lg:flex lg:justify-between lg:items-center">
                           
                            <div>
                                <p>You have a new candidate in: 
                                    <span class="font-bold">{{$notification->data['vacancy_name']}}</span>
                                </p>
                                <p>->
                                    <span class="font-bold">{{$notification->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <a href="{{route('candidates.index', $notification->data['vacancy_id'])}}" class="bg-teal-500 p-3 text-sm uppercase font-bold text-white">View candidates</a>
                            </div>
                        </div>
                    @empty
                    <p class="m-5 text-center text-gray-600 dark:text-gray-100">You dont have new notifications yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl font-bold text-center bm-10">Notifications History</h1>
                    @forelse ($notifications_history as $notification_history)
                        <div class="mt-5 p-5 border border-l-4 border-r-4 border-gray-200 lg:flex lg:justify-between lg:items-center">
                           
                            <div>
                                <p>You recieved a new candidate in: 
                                    <span class="font-bold">{{$notification_history->data['vacancy_name']}}</span>
                                </p>
                                <p>->
                                    <span class="font-bold">{{$notification_history->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <a href="{{route('candidates.index', $notification_history->data['vacancy_id'])}}" class="bg-teal-500 p-3 text-sm uppercase font-bold text-white">View candidates</a>
                            </div>
                        </div>
                    @empty
                    <p class="m-5 text-center text-gray-600 dark:text-gray-100">You dont have new notifications yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
