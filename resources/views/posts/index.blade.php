<x-app-layout>
    <div class="py-5 px-1 flex gap-2 flex-wrap">
        <div class="max-w-md mx-auto w-full bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
            <div class="md:flex">
                <form method="post" enctype="multipart/form-data" action="{{ route('posts.store') }}" class="p-4 md:p-6">
                    <input type="hidden" name="idGroup" value="{{ $idGroup }}">
                    <div class="mb-4 flex items-start gap-2">
                        <div class="md:flex-shrink-0">
                            @if (Auth::user()->image)
                                <img class="rounded-full h-8 w-8"
                                    src="{{ asset('storage/images/' . Auth::user()->image) }}" />
                            @else
                                <div class="w-8 rounded-full">
                                    <img class="rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=7F9CF5&background=EBF4FF" />
                                </div>
                            @endif
                        </div>

                        <div class="w-full">
                            <textarea id="content" required name="content" rows="3" placeholder="Apa yang Anda pikirkan?"
                                class="form-textarea block w-full text-black placeholder:text-gray-500 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
                        </div>
                    </div>

                    <div class="flex gap-2 items-center justify-end">
                        @csrf
                        <div>
                            <input type="file" id="image" name="image" accept="image/*" class="hidden">
                            <label for="image"
                                class="flex gap-2 items-center cursor-pointer bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                Foto
                            </label>
                        </div>
                        <div>
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                </svg>
                                Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="max-w-md mx-auto mt-5 rounded-xl shadow-md overflow-hidden md:max-w-2xl">
            <div role="tablist" class="tabs bg-[#375486] font-semibold p-2 gap-5 tabs-boxed">
                <a href="{{ route('posts.index') }}" role="tab"
                    class="tab {{ $tab == 'Umum' ? 'tab-active' : '' }} gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                    </svg>
                    <span class="text-white">Umum</span>
                </a>
                <a href="{{ route('posts.index', ['tab' => 'Grup']) }}" role="tab"
                    class="tab gap-1 {{ $tab == 'Grup' ? 'tab-active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <span class="text-white">Grup</span>
                </a>
            </div>
        </div>

        <div class="max-w-md flex flex-col gap-3 w-full text-gray-800 mx-auto mt-5 overflow-hidden md:max-w-2xl">
            @if ($tab == 'Umum')
                @forelse ($posts as $post)
                    <div class="p-4 bg-white md:p-6 rounded-xl shadow-md">
                        <div class="flex items-start gap-2">
                            <div class="md:flex-shrink-0">
                                @if ($post->creator_image)
                                    <img class="rounded-full h-8 w-8"
                                        src="{{ asset('storage/images/' . $post->creator_image) }}" />
                                @else
                                    <div class="w-8 rounded-full">
                                        <img class="rounded-full"
                                            src="https://ui-avatars.com/api/?name={{ $post->creator_name }}&color=7F9CF5&background=EBF4FF" />
                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="font-semibold">
                                    {{ $post->creator_name }}
                                </p>
                                <p class="text-gray-500 text-sm">
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                        $human = \Carbon\Carbon::parse($post->updated_at)->diffForHumans();
                                        echo $human;
                                    @endphp
                                </p>
                            </div>
                        </div>

                        @if ($post->photo)
                            <div class="mt-3">
                                <img src="{{ asset('storage/images/' . $post->photo) }}" alt="image"
                                    class="rounded-lg w-full h-48 object-cover">
                            </div>
                        @endif

                        <p class="mt-3 text-sm">
                            {{ $post->content }}
                        </p>

                        <div class="flex items-center justify-between w-full mt-3">
                            <div class="flex items-center justify-between mt-3">
                                <div class="flex gap-2">
                                    <button
                                        class="like-button {{ $post->is_liked ? 'text-red-500' : 'text-black' }} flex gap-1 items-center hover:text-red-500"
                                        data-post-id="{{ $post->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path
                                                d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                        </svg>
                                        <span class="like-count">{{ $post->like_count }}</span>
                                    </button>
                                    <button class="text-sky-500 flex gap-1 items-center hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $post->comment_count }}
                                    </button>
                                </div>
                            </div>
                            <div>
                                @if ($post->creator_id == Auth::id())
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-600 flex gap-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6 text-red-500">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 md:p-6 rounded-xl">
                        <p class="text-center">Belum ada postingan</p>
                    </div>
                @endforelse
            @else
                <div class="fixed bottom-4 right-4 z-10">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="btn btn-accent" onclick="my_modal_1.showModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Buat Grup
                    </button>
                </div>

                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box bg-white">
                        <h3 class="font-bold text-lg">Buat Grup</h3>
                        <form class="py-4" method="post" action="{{ route('groups.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="group_name" class="block text-sm font-medium text-gray-700">Nama
                                    Grup</label>
                                <input type="text" id="group_name" name="group_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div class="mb-4">
                                <label for="group_description"
                                    class="block text-sm font-medium text-gray-700">Deskripsi Grup</label>
                                <textarea id="group_description" name="group_description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            </div>
                            <div class="modal-action flex justify-end">
                                <button type="button" class="btn mr-2" onclick="my_modal_1.close()">Batal</button>
                                <button type="submit" class="btn btn-accent">Simpan</button>
                            </div>
                        </form>
                    </div>
                </dialog>


                @forelse ($groups as $group)
                    <div class="p-4 bg-white md:p-6 rounded-xl shadow-md">
                        <div class="flex items-start gap-2">
                            <div>
                                <p class="font-semibold">
                                    {{ $group->group_name }}
                                </p>
                                <span class="text-gray-500 text-xs font-semibold">
                                    {{ '@' . $group->creator_name }}
                                </span>
                                <p class="text-gray-500 text-sm">
                                    {{ $group->description }}
                                </p>
                            </div>
                        </div>
                        <div>
                            @if ($group->is_member || $group->is_admin)
                                <div class="flex gap-2 items-center">
                                    <a href="{{ route('posts.index', [
                                        'tab' => 'Umum',
                                        'id-group' => $group->id,
                                    ]) }}"
                                        class="btn btn-sm btn-info mt-3">Lihat
                                        Grup</a>

                                    @if ($group->is_member && !$group->is_admin)
                                        <form action="{{ route('anggota_grups.destroy', $group->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-warning mt-3">Keluar</button>
                                            </button>
                                        </form>
                                    @endif

                                    <a href="{{ route('grups.anggota.index', $group->id) }}"
                                        class="btn btn-sm btn-success mt-3">Anggota</a>

                                    @if ($group->is_admin)
                                        <form action="{{ route('grups.destroy', $group->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger mt-3">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            @else
                                @if ($group->is_pending)
                                    <span class="badge badge-outline  mt-3">Menunggu persetujuan</span>
                                @else
                                    <form action="{{ route('anggota_grups.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                                        <button type="submit" class="btn btn-sm btn-accent mt-3">Gabung</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="p-4 md:p-6 rounded-xl">
                        <p class="text-center">Belum ada grup</p>
                    </div>
                @endforelse
            @endif
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const likeButtons = document.querySelectorAll('.like-button');

            likeButtons.forEach(button => {
                button.addEventListener('click', async () => {
                    const postId = button.getAttribute('data-post-id');
                    const response = await fetch(`/like/${postId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    if (response.ok) {
                        const data = await response.json();
                        const likeCountSpan = button.querySelector('.like-count');
                        likeCountSpan.textContent = data.like_count;

                        // Toggle classes based on is_liked value
                        if (data.liked) {
                            button.classList.add('text-red-500');
                            button.classList.remove('text-black');
                        } else {
                            button.classList.remove('text-red-500');
                            button.classList.add('text-black');
                        }
                    }
                });
            });
        });
    </script>


</x-app-layout>
