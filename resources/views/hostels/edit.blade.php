<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier un hôtel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <h1 class="font-semibold text-3xl pb-6">Modifier un hôtel</h1>

                <form action="{{ route('hostels.update', $hostel->id) }}" method="POST" class="max-w-md mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block dark:text-white text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name" value="{{ $hostel->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Location</label>
                        <input type="text" name="location" id="location" value="{{ $hostel->location }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Editer</button>
                </form>

                @if(auth()->user()->is_admin)
                    <div class="py-6">
                    <h2 class="text-white text-lg py-4">Chambres :</h2>
                        <ul>
                            @foreach ($rooms as $room)
                                <li class="flex flex-row items-center border-t justify-between border-b border-white gap-4 py-3">
                                    <p class="text-white py-2">{{ $room->name }}</p>
                                    <form action="{{ route('rooms.edit', ['id' => $room->id]) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-3 px-4 rounded-lg">
                                            Modifier
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
