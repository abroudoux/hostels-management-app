<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hostel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <h1 class="font-semibold text-3xl pb-4">{{ $hostel->name }}</h1>
            <p clas="font-medium text-md pb-2">{{ $hostel->location }}</p>

            <div class="py-6">
                <h2 class="text-white text-lg py-4">CHAMBRES DISPONIBLES :</h2>
                @if (count($roomsAvaibles) === 0)
                    <p class="text-white">Aucune chambre disponible.</p>
                @else
                    <ul>
                        @foreach ($roomsAvaibles as $room)
                            <li class="flex flex-row items-center border-t justify-between border-b border-white gap-4 py-3">
                                <p class="text-white py-2">{{ $room->name }}</p>
                                <form action="{{ route('rooms.reserve', ['id' => $room->id, 'user_id' => Auth::user()->id, 'hostel_id' => $hostel->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-3 px-4 rounded-lg">
                                        Réserver
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <h2 class="text-white text-lg py-4 mt-6">CHAMBRES NON DISPONIBLES :</h2>
                @if (count($roomsNonAvaibles) === 0)
                    <p class="text-white">Toutes les chambres sont disponibles</p>
                @else
                    <ul>
                        @foreach ($roomsNonAvaibles as $room)
                            <li class="text-white">{{ $room->name }}</p>
                        @endforeach
                    </ul>
                @endif
            </div>

                <div class="py-6">
                    <button>
                        <a href="{{ route('hostels.index', $hostel->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-3 px-4 rounded-lg">Retourner à la liste des hôtels</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
