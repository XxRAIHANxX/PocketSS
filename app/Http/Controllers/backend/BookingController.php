<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Booking;
use App\User;

use FHelper;
use BHelper;

class BookingController extends Controller
{

    public static function pending(Request $request)
    {
        return view('backend.booking.pending');
    }

    public static function pendingdata(Request $request)
    {
        $booking = Booking::leftJoin('users as u', 'u.id', '=', 'bookings.user_id')
            ->where('bookings.paid', '=', 0)
            ->where('bookings.cancel', '=', 0)
            ->get(['bookings.*', 'u.name', 'u.email', 'u.ww_id']);


        return Datatables::of($booking)
            ->addColumn('data', function ($booking) {
                return BHelper::bookingdata($booking->id);
            })
            ->addColumn('payment', function ($booking) {
                if ($booking->paid == 0) {
                    return '<label class="label label-danger">Not Paid</label>';
                } else {
                    return '<label class="label label-success">Paid</label>';
                }
            })
            ->addColumn('date', function ($booking) {
                return date('d F, Y', strtotime($booking->date));
            })
            ->addColumn('user', function ($booking) {
                return $booking->name . '<br>' . $booking->email;
            })
            ->addColumn('action', function ($booking) {
                return '<button id="' . $booking->id . '" class="btn pay btn-success">Pay</button>';
            })
            ->make(true);
    }

    public function payforpending(Request $request)
    {
        $booking = Booking::find($request->route('id'));
        $booking->paid = 3;
        //$booking->bib_number = $request->bib;
        //$booking->cash_id = $request->cash_id;
        $booking->save();
        return $booking->id;
    }
}
