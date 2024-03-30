<x-app-layout>
    <div class="px-4 py-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Card Anggota Desa -->
            @foreach ($users as $user)
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <div class="flex items-center justify-center mb-4">
                        @if ($user->image)
                            <img src="{{ asset('storage/images/' . $user->image) }}" alt="{{ $user->name }}"
                                class="w-20 h-20 rounded-full object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ $user->name }}&color=7F9CF5&background=EBF4FF"
                                alt="{{ $user->name }}" class="w-20 h-20 rounded-full object-cover">
                        @endif
                    </div>
                    <div class="text-center">
                        <h3 class="text-lg font-semibold">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $user->nik }}</p>

                        @if (Auth::user()->role == 'Admin')
                            <div class="mt-4 flex justify-center space-x-2">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                    Hapus</button>
                                </form>

                                <form action="{{ route('users.confirm', $user->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="{{ $user->is_confirmed ? 'bg-yellow-500' : 'bg-green-500' }} text-white px-4 py-2 rounded-lg hover:bg-green-600">
                                        {{ $user->is_confirmed ? 'Batalkan Konfirmasi' : 'Konfirmasi' }}</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
