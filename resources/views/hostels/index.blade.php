<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tous les hôtels') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold text-3xl pb-6">Liste des hôtels</h1>

                    <form action="{{ route('hostels.index') }}" method="GET" class="flex items-center">
                        @if ($search)
                            <p class="text-white text-sm mr-2">Résultats pour : {{ $search }}</p>
                            <a href="{{ route('hostels.index') }}" class="text-blue-500 hover:underline text-sm pr-6">❌</a>
                        @endif
                        <input type="text" name="search" placeholder="Rechercher par nom d'hôtel..." class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Rechercher</button>
                    </form>
                </div>

                <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-800" aria-label="Hostels Table">
                    <thead>
                        <tr>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Location</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Chambres disponibles</th>
                            <th class="px-3 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                        @foreach ($hostelsAvaibles as $hostel)
                            <tr>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $hostel->name }}</td>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $hostel->location }}</td>
                                <td class="px-3 py-4 dark:text-gray-100">{{ $hostel->availableRoomsCount }}</td>
                                <td class="px-3 py-4 dark:text-gray-100 flex flex-row items-center gap-4">
                                    @if(auth()->user()->is_admin)
                                        <button class="py-2">
                                            <a href="{{ route('hostels.edit', $hostel->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-2 px-4 rounded-lg">Modifier</a>
                                        </button>
                                    @endif
                                    <button class="py-2">
                                        <a href="{{ route('hostels.show', $hostel->id) }}" class="bg-green-500 hover:bg-green-700 text-white text-lg font-bold py-2 px-4 rounded-lg">Réserver</a>
                                    </button>
                                    @if(auth()->user()->is_admin)
                                        <form action="{{ route('hostels.destroy') }}" method="POST" class="py-2">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{ $hostel->id }}" name="id">
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white text-lg font-bold py-2 px-4 rounded-lg">Supprimer</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-4">
                    {{ $hostels->links() }}
                </div>

                <div class="py-6">
                    @if(auth()->user()->is_admin)
                        <button>
                            <a href="{{ route('hostels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-3 px-4 rounded-lg">Ajouter un hotel</a>
                        </button>
                    @endif
                    <button>
                        <a href="{{ route('dashboard') }}" class="border border-white text-white text-lg font-bold py-3 px-4 rounded-lg">Retour au dashboard</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
