@extends('layouts.dashboard')

@section('content1')
<section class="p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="relative shadow-xl shadow-black sm:rounded-lg overflow-hidden bg-[#4A5568]">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <h2 class="text-xl font-semibold text-white">Notifications</h2>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-white">
                    <thead class="text-xs text-gray-700 uppercase bg-[#4A5568] text-white text-center">
                        <tr>
                            
                            <th scope="col" class="px-4 py-3">Message</th>
                            <th scope="col" class="px-4 py-3">Date</th>
                            <th scope="col" class="px-4 py-3">Reading status</th>
                            <th scope="col" class="px-4 py-3">procedures</th>
                        </tr>
                    </thead>

                    <tbody class="text-white text-center font-bold">
                        @forelse($notifications as $notification)
                        <tr class="border-b dark:border-gray-700">
                           
                            <td class="px-4 py-3">{{ $notification->data['message'] ?? 'No message' }}</td>
                            <td class="px-4 py-3">{{ $notification->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-3">
                                @if($notification->read_at)
                                    <span class="text-green-400">Read</span>
                                @else
                                    <span class="text-red-400">Unread</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <form action="{{ route('admin.notifications.markRead', $notification->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-[#3182CE] px-3 py-1 rounded text-white ">
                                     Mark as read
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 py-3">There are no notifications yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@endsection