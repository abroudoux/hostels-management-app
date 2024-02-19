<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Réserver la chambre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <h1 class="font-semibold text-3xl pb-6">Réserver la chambre</h1>

                <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-800" aria-label="Room Table">
                    <thead>
                        <tr>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nom de l'hôtel</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Location</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                        @foreach ($rooms as $room)
                            <tr>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $room->name }}</td>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $room->hostel_name }}</td>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $room->hostel_location }}</td>
                                <td class="px-3 py-4 dark:text-gray-100">
                                <form action="{{ route('rooms.reserve', ['id' => $room->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Réserver</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
