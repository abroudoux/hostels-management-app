<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if(auth()->user()->is_admin)
                {{ __('Toutes les réservations') }}
            @else
                {{ __('Vos réservations') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(auth()->user()->is_admin)
                        <h1 class="font-semibold text-3xl pb-6">Toutes les réservations :</h1>
                    @else
                        <h1 class="font-semibold text-3xl pb-6">Vos réservations :</h1>
                    @endif

                    @if (count($reservations) === 0)
                        <p>Aucune réservation pour le moment.</p>
                    @else
                        @if(auth()->user()->is_admin)
                            <form action="{{ route('dashboard') }}" method="GET" class="mb-6">
                                <div class="flex items-center">
                                    <label for="search" class="mr-2">Rechercher :</label>
                                    <input type="text" name="search" id="search" class="border border-gray-300 text-black rounded-md px-3 py-2" placeholder="Nom d'utilisateur, nom d'hôtel ou nom de chambre">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-md font-bold py-2 px-3 rounded-md ml-2">Rechercher 🔎</button>
                                </div>
                            </form>
                        @endif

                        <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-800" aria-label="Reservation details">
                            <thead>
                                <tr>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Room</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Numéro</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Hôtel</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Localisation</th>
                                    @if(auth()->user()->is_admin)
                                        <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Personne</th>
                                    @endif
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Début</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fin</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                                @foreach ($reservations->take(25) as $reservation)
                                    <tr>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->room_name }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->room_number }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->hostel_name }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->hostel_location }}</td>
                                        @if(auth()->user()->is_admin)
                                            <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->user_name }}</td>
                                        @endif
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->start_date }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->end_date }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">
                                            <a href="{{ route('reservations.show', $reservation->id) }}" class="bg-blue-500 rounded-lg py-2 px-3 hover:bg-blue-700">
                                                Infos
                                            </a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="my-4">
                            {{ $reservations->links() }}
                        </div>
                    @endif
                </div>
                <div class="m-6">
                    <h2 class="dark:text-gray-100 py-6 text-xl font-semibold">Envie de réserver une chambre ?</h2>
                    <button>
                        <a href="{{ route('rooms.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-3 px-4 rounded-lg">
                            Voir les chambres
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
