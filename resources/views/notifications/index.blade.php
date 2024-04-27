<x-app-layout>

    <div class="py-5 px-3 flex gap-2 flex-wrap">

        <div class="flex w-full justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Notifikasi</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notif)
                        <tr class="{{ $notif->read == 0 ? 'font-semibold bg-gray-200' : 'bg-transparent' }}">
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img
                                                src="{{ asset('storage/images/' . $notif->foto) }}"class="h-8 w-8 rounded-full">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">
                                            {{ $notif->name }}
                                        </div>
                                        <div class="text-sm opacity-50">
                                            @php
                                                $lang = 'id';
                                                \Carbon\Carbon::setLocale($lang);
                                                $date = \Carbon\Carbon::parse($notif->created_at);
                                                $date = $date->diffForHumans();
                                                echo $date;
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                              <a 
                              href="{{ $notif->url . "?notif_id=" . $notif->id }}"
                                <span class="font-semibold">{{ $notif->name }}</span>
                                {{ $notif->message  ?? '-'}}
                              </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</x-app-layout>
