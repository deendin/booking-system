<form id="contact" action="{{ route('booking.store') }}" method="post">
    {{ csrf_field() }}
    <h3>Booking Form</h3>
    
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <fieldset>
        <label>Name</label>
        <input name="name" placeholder="Name" type="text" tabindex="1" autofocus>
        @error('name')
            <div class="alert-danger">{{ $message }}</div>
        @enderror
    </fieldset>
    <fieldset>
        <label>Booking Date</label>
    <input name="booking_date" placeholder="Booking Date" type="date" tabindex="1" autofocus>
        @error('booking_date')
            <div class="alert-danger">{{ $message }}</div>
        @enderror
    </fieldset>
    <fieldset>
        <label>Flexibility</label>
        <select name="flexibility">
            <option value="">Choose One</option>

            @foreach($flexibilities as $flexibility)
                <option value="{{ $flexibility->id }}">{{ $flexibility->name }}</option>
            @endforeach
        </select>

        @error('flexibility')
            <div class="alert-danger">{{ $message }}</div>
        @enderror
    </fieldset>
    <fieldset>
    <label>Vehicle Size</label>
        <select name="vehicle_size">
            <option value="">Choose One</option>

            @foreach($vehicleSizes as $vehicleSize)
                <option value="{{ $vehicleSize->id }}">{{ $vehicleSize->name }}</option>
            @endforeach
        </select>
        @error('vehicle_size')
            <div class="alert-danger">{{ $message }}</div>
        @enderror
    </fieldset>
    <fieldset>
        <label>Contact Number</label>
        <input name="contact_number" placeholder="Contact Number" type="tel" tabindex="3">
        @error('contact_number')
            <div class="alert-danger">{{ $message }}</div>
        @enderror
    </fieldset>
    <fieldset>
        <label>Email Address</label>
        <input name="email_address" placeholder="Email Address" type="email" tabindex="2">
        @error('email_address')
            <div class="alert-danger">{{ $message }}</div>
        @enderror
    </fieldset>
    <fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
</form>