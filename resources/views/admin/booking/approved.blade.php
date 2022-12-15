@extends('layouts.master')

    @section('style')
        <link href="{{ asset('css/bookings_table.css') }}" rel="stylesheet"></link>

        <link href="{{ asset('css/nav_style.css') }}" rel="stylesheet"></link>
    @endsection

    @section('title')
        All Approved Bookings
    @endsection

    @section('content')

        @include('admin.nav')

        <div class="container">  
            <h2>All Approved Bookings</h2>
            
            @include('admin.booking.partials.approved_list')
        </div>

    @endsection