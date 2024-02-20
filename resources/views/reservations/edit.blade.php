<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier la réservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-gray-900 dark:text-gray-100">
                <h1 class="font-semibold text-3xl pb-4">{{ $reservation->room_name }} - {{ $reservation->hostel_name }}</h1>
                <p clas="font-medium text-md pb-2">Par {{ $reservation->user_name }} du {{ $reservation->start_date }} au {{ $reservation->end_date }}</p>
            </div>
        </div>

        <h2>User</h2>
        <p>{{ $reservation->user->name }}</p>
        <p>{{ $reservation->user->email }}</p>
    </div>
</x-app-layout>
