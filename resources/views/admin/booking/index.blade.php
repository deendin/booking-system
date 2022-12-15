@extends('layouts.master')

    @section('style')
        <link href="{{ asset('css/bookings_table.css') }}" rel="stylesheet"></link>

        <link href="{{ asset('css/nav_style.css') }}" rel="stylesheet"></link>
    @endsection

    @section('title')
        All Bookings
    @endsection

    @section('content')

        @include('admin.nav')

        <div class="container">  
            <h2>All Bookings</h2>
            
        @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div> <br>
            @endif

            @include('admin.booking.partials.list')
        </div>

    @endsection