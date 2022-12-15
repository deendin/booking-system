<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ApproveBookingAction;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\BookingRepositoryInterface;
use App\Repositories\ApprovedBookingRepository;
use App\Repositories\BookingRepository;
use Illuminate\Contracts\View\View;

class ApprovedBookingController extends Controller
{
    /**
     * Constructor
     * 
     * @param ApprovedBookingRepository $approvedBookingRepository
     * @param BookingRepositoryInterface $bookigRepository
     */
    public function __construct(
        private ApprovedBookingRepository $approvedBookingRepository,
        private BookingRepository $bookingRepository,
    ) {
    }

    /**
     * Approves a new booking
     * 
     * @param string $uuid
     * 
     */
    public function approve(string $uuid)
    {
        $booking = $this->bookingRepository->findById($uuid);
        
        $action = app(ApproveBookingAction::class);
        
        $action->approve($booking);

        return redirect()->route('admin.booking.index')->with('success', 'Booking approved successfully!');
    }

    /**
     * Returns approved booking index/list page.
     * 
     * @return View
     */
    public function index() : View
    {
        return view('admin.booking.approved', [
            'approved_bookings' => $this->approvedBookingRepository->findAll(),
        ]);
    }
}
