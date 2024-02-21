<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Toutes les chambres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <h1 class="font-semibold text-3xl pb-6">Liste des chambres disponibles</h1>

                <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-800" aria-label="Rooms Table">
                    <thead>
                        <tr>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nom de l'hôtel</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Location</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Réserver</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                        @foreach ($rooms->take(25) as $room)
                            <tr>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $room->name }}</td>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $room->hostel_name }}</td>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $room->hostel_location }}</td>
                                <td class="px-3 py-4 dark:text-gray-100">
                                    <form action="{{ route('reservations.create', ['id' => $room->id, 'user_id' => Auth::user()->id]) }}" method="POST" class="flex flew-row items-center">
                                        <div class="flex mr-2">
                                            <input type="number" name="persons" class="bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 mr-2" placeholder="Persons" required>
                                        </div>
                                        <div class="flex mr-2">
                                            <input type="date" name="start_date" class="bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 mr-2" placeholder="Start Date" required>
                                            <input type="date" name="end_date" class="bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2" placeholder="End Date" required>
                                        </div>
                                        @csrf
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-3 px-4 rounded-lg">
                                            Réserver
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-4">
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
