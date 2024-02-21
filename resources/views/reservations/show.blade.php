<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Information sur la réservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:bg-gray-800 sm:rounded-lg">
            <div class="text-gray-900 dark:text-gray-100 p-6">
                <h1 class="font-semibold text-3xl pb-4">{{ $reservation->room_name }} - {{ $reservation->hostel_name }}</h1>
                <p clas="font-medium text-md pb-2">Par {{ $reservation->user_name }} du {{ $reservation->start_date }} au {{ $reservation->end_date }}</p>

                <div class="py-6">
                <h2 class="text-white text-lg py-4">ACTIONS :</h2>
                <div class="flex flex-row gap-4 items-center">
                        <form action="{{ route('reservations.destroy') }}" method="POST" class="py-2">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $reservation->id }}" name="id">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white text-lg font-bold py-2 px-4 rounded-lg">
                                @if(auth()->user()->is_admin)
                                    Supprimer la réservation
                                @else
                                    Supprimer ma réservation
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
