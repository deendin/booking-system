<table width="100%">
    <tr>
        <th>Name</th>
        <th>Booking Date</th>
        <th>Flexibility</th>
        <th>Vehicle Size</th>
        <th>Contact Number</th>
        <th>Email Address</th>
        <th>Status</th>
    </tr>

    @if( $approved_bookings->isNotEmpty() )

        @foreach($approved_bookings as $approved)

            <tr>
                <td>{{ $approved->booking->user->name }}</td>
                <td>{{ $approved->booking->booking_date->diffForHumans() }}</td>
                <td>{{ $approved->booking->flexibility->name }}</td>
                <td>{{ $approved->booking->vehicle_size->name }}</td>
                <td>{{ $approved->booking->contact_number }}</td>
                <td>{{ $approved->booking->user->email }}</td>
                <td>Approved</td>
            </tr>
            
        @endforeach

    @endif
</table>