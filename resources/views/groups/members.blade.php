<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6  border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Group Members ({{ $members->count() }} Orang)

                </h2>

                <div class="overflow-x-auto">
                    <table class="table  min-w-full divide-y divide-gray-200">
                        <tbody class=" divide-y divide-gray-200">
                            @foreach ($members as $member)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if ($member->image)
                                                <img class="h-10 w-10 rounded-full"
                                                    src="{{ asset('storage/images/' . $member->image) }}"
                                                    alt="Group Image">
                                            @else
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://ui-avatars.com/api/?name={{ $member->name }}&color=7F9CF5&background=EBF4FF" />
                                            @endif
                                        </div>
                                        <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap flex gap-2 flex-wrap text-sm font-medium">
                                        @if ($isAdminGroup)
                                            <form
                                                action="{{ route('groups.members.delete', [
                                                    'id' => $group->id,
                                                    'memberId' => $member->id,
                                                ]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-error btn-sm">Delete</button>
                                            </form>
                                        @endif

                                        @if ($member->status == 'Pending' && isAdminGroup)
                                            <form
                                                action="{{ route('groups.members.confirm', [
                                                    'id' => $group->id,
                                                    'memberId' => $member->id,
                                                ]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-info btn-sm">Konfirmasi</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
