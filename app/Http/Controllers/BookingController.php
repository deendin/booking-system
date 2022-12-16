<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Actions\CreateBooking;
use App\Http\Requests\StoreBookingRequest;
use App\Repositories\FlexibilityRepository;
use App\Repositories\VehicleSizeRepository;
use Illuminate\Contracts\View\View;

class BookingController extends Controller
{
    /**
     * Constructor
     * 
     * @param FlexibilityRepository $flexibilityRepository
     * @param VehicleSizeRepository $vehicleSizeRepository
     * 
     */
    public function __construct(
        public FlexibilityRepository $flexibilityRepository,
        public VehicleSizeRepository $vehicleSizeRepository
    ) {
    }

    /**
     * Create a new booking
     * 
     * @param App\Http\Requests\StoreBookingRequest $request
     * 
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = app(CreateBooking::class);

        $data  = $booking->create($request->all());

        // Upgrade to use uuid or strings?
        $booking_id = $data->id;

        $booking_details = !auth()->user() ? "Your booking id is : ${booking_id}" : null;

        return redirect()->back()->with('success', "Booking created successfully! $booking_details");
    }

    /**
     * Returns booking create page.
     * 
     */
    public function create() : View
    {
        return view('booking.create', [
            'flexibilities' => $this->flexibilityRepository->findAll(),
            'vehicleSizes' => $this->vehicleSizeRepository->findAll(),
        ]);
    }
}
