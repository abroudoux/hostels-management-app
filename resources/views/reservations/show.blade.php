<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Information sur la réservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-gray-900 dark:text-gray-100">
                <h1 class="font-semibold text-3xl pb-4">{{ $reservation->room_name }} - {{ $reservation->hostel_name }}</h1>
                <p clas="font-medium text-md pb-2">Par {{ $reservation->user_name }} du {{ $reservation->start_date }} au {{ $reservation->end_date }}</p>
            </div>

            <div class="py-6">
               <h2 class="text-white text-lg py-4">ACTIONS :</h2>
               <div class="flex flex-row gap-4 items-center">
                    @if(auth()->user()->is_admin)
                        <button class="py-2">
                            <a href="{{ route('reservations.update', $reservation->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-2 px-4 rounded-lg">Modifier</a>
                        </button>
                    @endif
                    <form action="{{ route('reservations.destroy') }}" method="POST" class="py-2">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ $reservation->id }}" name="id">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white text-lg font-bold py-2 px-4 rounded-lg">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
