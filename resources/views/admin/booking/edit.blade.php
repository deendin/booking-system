@extends('layouts.master')
    @section('style')
        <link href="{{ asset('css/booking_form.css') }}" rel="stylesheet"> </link>

        <link href="{{ asset('css/bookings_table.css') }}" rel="stylesheet"></link>

        <link href="{{ asset('css/nav_style.css') }}" rel="stylesheet"></link>
    @endsection

    @section('title')
        Update Booking
    @endsection

    @section('content')

        @include('admin.nav')
        
        <div class="container">             
            @include('admin.booking.partials.edit')
        </div>

    @endsection