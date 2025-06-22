@extends('layouts.user')

@section('content2')
<section class="p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="relative shadow-xl shadow-black sm:rounded-lg overflow-hidden bg-[#4A5568]">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <h2 class="text-xl font-semibold text-white">Notifications</h2>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-white ">
                    <thead class="text-xs bg-[#4A5568]  uppercase text-white text-center">
                        <tr>
                            <th scope="col " class="px-4 py-3 ">Message</th>
                            <th scope="col" class="px-4 py-3">Date</th>
                            <th scope="col" class="px-4 py-3">Reading Status</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>

                    <tbody >
                        @forelse(auth()->user()->notifications as $notification)
                            <tr class="border-b border-[#718096] text-center">
                                <td class="px-4 py-3">{{ $notification->data['message'] ?? 'No message' }}</td>
                                <td class="px-4 py-3">{{ $notification->created_at->diffForHumans() }}</td>
                                <td class="px-4 py-3">
                                    @if($notification->read_at)
                                        <span class="text-green-400 font-semibold">Read</span>
                                    @else
                                        <span class="text-yellow-400 font-semibold">Unread</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if(!$notification->read_at)
                                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button class="text-green-500 ">Mark as read</button>
                                        </form>
                                    @endif

                                    @if(isset($notification->data['booking_id']))
                                        <form action="{{ route('bookings.approveFromNotification', $notification->data['booking_id']) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                          
                                    
                                           
                                            <button class="text-green-500 ">Approve Booking</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-white">No notifications found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



@endsection