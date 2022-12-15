@extends('layouts.master')
    @section('style')
        <link href="{{ asset('css/booking_form.css') }}" rel="stylesheet"> </link>

        <link href="{{ asset('css/bookings_table.css') }}" rel="stylesheet"></link>

        <link href="{{ asset('css/nav_style.css') }}" rel="stylesheet"></link>
    @endsection

    @section('title')
        Create Booking
    @endsection

    @section('content')
        @if(
            auth()->user() &&
            auth()->user()->role === "admin"
        )
            @include('admin.nav')
        @endif

        <div class="container">             
            @include('booking.form')
        </div>

    @endsection