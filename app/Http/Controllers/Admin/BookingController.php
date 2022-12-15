<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Actions\CreateBooking;
use App\Actions\DeleteBooking;
use App\Actions\UpdateBooking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Repositories\BookingRepository;
use App\Repositories\FlexibilityRepository;
use App\Repositories\VehicleSizeRepository;
use Illuminate\Contracts\View\View;

class BookingController extends Controller
{
    /**
     * Constructor
     * 
     * @param BookingRepository $bookingRepository
     * @param FlexibilityRepository $flexibilityRepository
     * @param VehicleSizeRepository $vehicleSizeRepository
     * 
     */
    public function __construct(
        private BookingRepository $bookingRepository,
        private FlexibilityRepository $flexibilityRepository,
        private VehicleSizeRepository $vehicleSizeRepository,
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

        $booking->create($request->all());

        return redirect()->route('admin.booking.index')->with('success', 'Booking created successfully!');
    }

    /**
     * Returns booking index/list page.
     * 
     * @return View
     */
    public function index() : View
    {
        return view('admin.booking.index', [
            'bookings' => $this->bookingRepository->findAll(),
        ]);
    }

    /**
     * Returns booking create page.
     * 
     * @return View
     * 
     */
    public function create() : View
    {
        return view('booking.create', [
            'flexibilities' => $this->flexibilityRepository->findAll(),
            'vehicleSizes' => $this->vehicleSizeRepository->findAll(),
        ]);
    }

    /**
     * Returns booking edit page.
     * 
     * @param string $uuid
     * 
     * @return View
     */
    public function edit(string $uuid) : View
    {
        return view('admin.booking.edit', [
            'booking' => $this->bookingRepository->findById($uuid),
            'flexibilities' => $this->flexibilityRepository->findAll(),
            'vehicleSizes' => $this->vehicleSizeRepository->findAll(),
        ]);
    }

    /**
     * Updates a booking
     * 
     * @param App\Http\Requests\UpdateBookingRequest $request
     * @param App\Models\Booking $booking
     * 
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $action = app(UpdateBooking::class);

        $action->update($booking, $request->all());

        return redirect()->route('admin.booking.index')->with('success', 'Booking updated successfully!');
    }

    /**
     * Soft deletes a booking.
     * 
     * @param string $uuid
     * 
     * @return View
     */
    public function destroy(string $uuid)
    {
        $booking = $this->bookingRepository->findById($uuid);

        $action = app(DeleteBooking::class);

        $action->delete($booking);

        return redirect()->back()->with('success', 'Booking deleted successfully!');
    }
}
