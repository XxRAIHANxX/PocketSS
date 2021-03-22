<?php 
namespace App\Helpers;

use App\Booking;
use App\Timeslot;

class BackendHelper
{
	
	public static function bookingdata($id){
		$date = Booking::where('id','=',$id)->pluck('date');
		$court = Booking::where('id','=',$id)->pluck('court');
		
		$timeslot_id = Booking::where('id','=',$id)->pluck('timeslot_id');

		$start = Timeslot::where('id','=',$timeslot_id)->pluck('start');
		$end = Timeslot::where('id','=',$timeslot_id)->pluck('end');

		$html = '';
		$html .= '<p>Timeslot: '.date('h:i A',strtotime($start)).' - '.date('h:i A',strtotime($end)).'</p>';
		$html .= '<p>Court: '.$court.'</p>';
		return $html;
	}

	public static function pendingpaymentcount(){
		return Booking::where('paid','=',0)->count();
	}
	
}
