<x-app-layout>
    <!-- Header -->
    <a
    href={{route('groups.members', [$group->id])}}
    class="fixed top-0 left-0 right-0 bg-[#8ba1bc] text-black shadow-md px-4 py-2 z-10">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <!-- Logo WhatsApp -->
                @if ($group->image)
                    <img src="{{asset('storage/images/' . $group->image)}}"
                    alt="WhatsApp Logo" class="h-8 w-8 rounded-full"
                    >
                @else
                    <div class="h-8 w-8 bg-gray-300 rounded-full"></div>
                @endif

                <!-- Nama Grup -->
                <div>
                    <div class="font-semibold text-lg">
                        {{$group->group_name}}
                    </div>
                    <div class="text-gray-900 text-sm">{{$totalGroupMembers}} anggota</div>
                </div>
            </div>
        </div>
    </a>

    <!-- Daftar Chat -->
    <div class="px-4 max-w-md mx-auto pt-5 pb-20 overflow-y-auto" style="height: calc(100vh - 80px);">
        <!-- Other -->
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
            <div class="bg-[#81c6d9] rounded-lg py-2 px-4 ml-2">
                <div class="text-sm text-gray-900 font-bold">Nama Pengirim</div>
                <div class="text-base">Pesan dummy dari pengirim</div>
                <p class="text-xs text-gray-500">10:00</p>
            </div>
        </div>

        <!-- Image Other -->
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
            <div class="bg-[#81c6d9] rounded-lg py-2 px-4 ml-2">
                <img src="https://via.placeholder.com/150" alt="Image" class="w-full h-40 object-cover rounded-lg">
                <div class="text-sm text-gray-900 font-bold mt-3">Nama Pengirim</div>
                <div class="text-base">Pesan dummy dari pengirim</div>
                <p class="text-xs text-gray-500">10:00</p>
            </div>
        </div>

        <!-- File Other -->
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
            <div class="bg-[#81c6d9] rounded-lg py-2 px-4 ml-2">
                <div class="flex flex-col items center space-x-2">
                    <div>
                        <div class="text-sm text-gray-900 font-bold">Nama Pengirim</div>
                        <div class="text-base">Pesan dummy dari pengirim</div>
                        <p class="text-xs text-gray-500">10:00</p>
                    </div>
                    <button class="bg-[#81c6d9] text-black px-2 py-1 rounded-lg">Download File</button>
                </div>
            </div>
        </div>
        <!-- Me -->
        <div class="flex items-center justify-end mb-4">
            <div class="bg-[#dadada] rounded-lg py-2 px-4 mr-2">
                <div class="text-base">Pesan dummy dari lawan bicara</div>
                <p class="text-xs text-right text-gray-500">10:01</p>
            </div>
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
        </div>

        <!-- image me -->
        <div class="flex items-center justify-end mb-4">
            <div class="bg-[#dadada] rounded-lg py-2 px-4 mr-2">
                <img src="https://via.placeholder.com/150" alt="Image" class="w-full h-40 object-cover rounded-lg">
                <div class="text-base mt-3">Pesan dummy dari lawan bicara</div>
                <p class="text-xs text-right text-gray-500">10:01</p>
            </div>
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
        </div>

        <!-- file me-->
        <div class="flex items-center justify-end mb-4">
            <div class="bg-[#dadada] rounded-lg py-2 px-4 mr-2">
                <div class="flex flex-col items center space-x-2">
                    <div>
                        <div class="text-base">Pesan dummy dari lawan bicara</div>
                        <p class="text-xs text-right text-gray-500">10:01</p>
                    </div>
                    <button class="bg-[#dadada] text-black px-2 py-1 rounded-lg">Download File</button>
                </div>
            </div>
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
        </div>
    </div>

    <!-- Input Pesan -->
    <div class="fixed bottom-0 left-0 right-0 bg-white shadow-md px-4 py-2">
        <form action="#" method="POST" enctype="multipart/form-data" class="flex items-center space-x-2">
            <input type="text"
            name="message_content"
            placeholder="Ketik pesan..."
                class="flex-grow border rounded-lg px-4 py-2 focus:outline-none">
            <!-- Logo Attachment -->
            <label for="attachment" class="cursor-pointer">
                {{-- // attachment svg --}}

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 rotate-12">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                </svg>

            </label>
            <input type="file" id="attachment" name="attachment" class="hidden">
            <button type="button" id="sendButton"
                class="bg-green-500 hover:bg-green-600 text-white px-2 py-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                </svg>
            </button>
        </form>
    </div>

    <script>
           // Scroll ke bawah halaman saat halaman selesai dimuat
           window.onload = function() {
            var chatContainer = document.querySelector('.overflow-y-auto');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        };

        document.getElementById('attachment').addEventListener('change', function() {
            // Mengubah label pada tombol attachment menjadi nama file yang dipilih
            var fileName = this.files[0].name;
            var labelElement = document.querySelector('label[for="attachment"]');
            labelElement.textContent = fileName;
        });

        document.getElementById('sendButton').addEventListener('click', function() {
            // Mengirimkan form atau melakukan aksi lainnya saat tombol kirim ditekan
            var formElement = document.querySelector('form');
            formElement.submit(); // Ganti dengan aksi yang sesuai dengan kebutuhan Anda
        });
    </script>

</x-app-layout>
