<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tous les hôtels') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <h1 class="font-semibold text-3xl pb-6">Liste des hôtels</h1>

                <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-800" aria-label="Hostels Table">
                    <thead>
                        <tr>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Location</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                        @foreach ($hostels as $hostel)
                            <tr>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $hostel->name }}</td>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $hostel->location }}</td>
                                <td class="px-3 py-4 dark:text-gray-100 flex flex-row items-center gap-4">
                                    <button class="py-2">
                                        <a href="{{ route('hostels.edit', $hostel->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-2 px-4 rounded-lg">Modifier</a>
                                    </button>
                                    <button class="py-2">
                                        <a href="{{ route('hostels.show', $hostel->id) }}" class="bg-green-500 hover:bg-green-700 text-white text-lg font-bold py-2 px-4 rounded-lg">Détails</a>
                                    </button>
                                    <form action="{{ route('hostels.destroy') }}" method="POST" class="py-2">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value="{{ $hostel->id }}" name="id">
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white text-lg font-bold py-2 px-4 rounded-lg">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="py-6">
                    <button>
                        <a href="{{ route('hostels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-3 px-4 rounded-lg">Ajouter un hotel</a>
                    </button>
                    <button>
                        <a href="{{ route('dashboard') }}" class="border border-white text-white text-lg font-bold py-3 px-4 rounded-lg">Retour au dashboard</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
