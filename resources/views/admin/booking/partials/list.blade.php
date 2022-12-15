<table width="100%">
    <tr>
        <th>Name</th>
        <th>Booking Date</th>
        <th>Flexibility</th>
        <th>Vehicle Size</th>
        <th>Contact Number</th>
        <th>Email Address</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @if($bookings->isNotEmpty())

        @foreach($bookings as $booking)

            <tr>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->booking_date->diffForHumans() }}</td>
                <td>{{ $booking->flexibility->name }}</td>
                <td>{{ $booking->vehicle_size->name }}</td>
                <td>{{ $booking->contact_number }}</td>
                <td>{{ $booking->user->email }}</td>
                <td>{{ $booking->approved ? 'Approved' : 'Pending'  }}</td>
                <td>
                    <a href="{{ route('admin.booking.approve_booking', $booking->uuid) }}">Approve</a>
                    <a href="{{ route('admin.booking.edit', $booking->uuid) }}">Edit</a>
                    <a href="{{ route('admin.booking.destroy', $booking->uuid) }}">Delete</a>
                </td>
            </tr>
            
        @endforeach

    @endif
</table>