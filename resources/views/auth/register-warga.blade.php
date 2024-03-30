<x-guest-layout>
    <form method="POST"
    enctype="multipart/form-data"
    action="{{ route('register-warga.store') }}" class="flex flex-col justify-evenly">
        @csrf
        <section>
            <h1 class="text-3xl text-center font-extrabold">Daftar Akun</h1>
        </section>

        <section class="mt-5 flex flex-col gap-4">
            <input type="text" required name="name" placeholder="Nama Pengguna"
                class="input bg-[#7f9ab6] placeholder:text-black input-bordered w-full max-w-xs mx-auto" />
            <input type="text" required name="nik" placeholder="NIK"
                class="input bg-[#7f9ab6] placeholder:text-black input-bordered w-full max-w-xs mx-auto" />
            <input type="text" required name="alamat" placeholder="Alamat"
                class="input bg-[#7f9ab6] placeholder:text-black input-bordered w-full max-w-xs mx-auto" />
            <input type="text" required name="no_hp" placeholder="No Handphone"
                class="input bg-[#7f9ab6] placeholder:text-black input-bordered w-full max-w-xs mx-auto" />

            <select name="id_desa" required class="input bg-[#7f9ab6] placeholder:text-black text-black input-bordered w-full max-w-xs mx-auto">
                <option value="">Pilih Desa</option>
                @foreach ($daftarDesa as $desa)
                    <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                @endforeach
            </select>

            <input type="password" required name="password" placeholder="Kata Sandi"
                class="input bg-[#7f9ab6] placeholder:text-black input-bordered w-full max-w-xs mx-auto" />
            <input type="password" required name="password_confirmation" placeholder="Konfirmasi Kata Sandi"
                class="input bg-[#7f9ab6] placeholder:text-black input-bordered w-full max-w-xs mx-auto" />

            <div id="uploadContainer"
                class="bg-[#5f7ca1] w-full h-32 max-w-xs mx-auto rounded-xl flex items-center justify-center cursor-pointer">
                <label for="fileInput" class="w-full h-full flex items-center justify-center">
                    <input id="fileInput" name="image" required type="file" class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-12 h-12 object-contain">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </label>
            </div>

        </section>

        <section class="mt-5 flex justify-center">
            <button type="submit"
                class="px-3 py-2 btn border-none bg-[#81c7d8] w-full max-w-xs mx-auto">DAFTAR</button>
        </section>

    </form>
</x-guest-layout>
