<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier une room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <h1 class="font-semibold text-3xl pb-6">Modifier un hôtel</h1>

                <form action="{{ route('rooms.update', $room->id) }}" method="POST" class="max-w-md mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name" value="{{ $room->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="hostel_name" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">hostel_name</label>
                        <input type="text" name="hostel_name" id="hostel_name" value="{{ $room->hostel_name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="hostel_location" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">hostel_location</label>
                        <input type="text" name="hostel_location" id="hostel_location" value="{{ $room->hostel_location }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <br>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifiers</button>
                </form>

                @if(auth()->user()->is_admin)
                    <div class="py-6 mb-4">
                        <form action="{{ route('reservations.create', ['id' => $room->id, 'user_id' => Auth::user()->id]) }}" method="POST">
                            @csrf
                            <label for="user_id" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Assigner à un utilisateur</label>
                            <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Sélectionner un utilisateur</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded focus:outline-none focus:shadow-outline">Assigner</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
