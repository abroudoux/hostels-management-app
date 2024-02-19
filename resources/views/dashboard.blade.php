<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-lg pb-6">VOS RÉSERVATIONS :</h2>
                    @if (count($reservations) === 0)
                        <p>Aucune réservation pour le moment.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-800">
                            <thead>
                                <tr>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nom de la room</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Numéro de la room</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nom de l'hôtel</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Localisation de l'hôtel</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nom de l'utilisateur</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Début de la réservation</th>
                                    <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fin de la réservation</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->room_name }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->room_number }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->hostel_name }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->hostel_location }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->user_name }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->start_date }}</td>
                                        <td class="px-3 py-4 dark:text-gray-100">{{ $reservation->end_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="m-6">
                    <h2 class="dark:text-gray-100 py-5 text-xl font-semibold">Envie de réserver une chambre ?</h2>
                    <button>
                        <a href="{{ route('rooms.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Voir les chambres
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>