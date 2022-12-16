<x-mail::message>
# Introduction

Hello {{ $user->name }},

This is to notify you that your booking with the id: {{ $booking->id }} has now been approved.

<b> Booking Date: </b> {{ $booking->booking_date->diffForHumans() }} </br> </br>

<b> Flexibility: </b> {{ $booking->flexibility->name }} </br> 

<b> Vehicle Size: </b> {{ $booking->vehicle_size->name }} </br> 

<b> Contact Number: </b> {{ $booking->contact_number }} </br> 

<b> Email Address: </b> {{ $user->email }} </br> 

Thank you,<br>

{{ config('app.name') }}
</x-mail::message>
