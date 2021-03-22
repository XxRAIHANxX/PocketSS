<?php  
namespace App\Helpers; 

use App\Timeslot;
use App\Booking;
use App\User;
use App\Wallet;
use App\Point;
use App\ScoreDetails;
use App\Score;
use Session;
use Auth;
use DB;

class FrontendHelper
{
	
	public static function breadcrumb($title){
		$html = '';
		$html .= '
		<div id="middle" class="sidebar-container " role="complementary">
	<div class="sidebar-inner">
		<div class="widget-area clearfix">
			<div id="vc_widget-3" class="widget-1 widget-first widget-last widget-odd widget widget_vc_widget">
				<div class="scoped-style">
					<style type="text/css" data-type="vc_shortcodes-custom-css" scoped="">
					.vc_custom_1448548346586 {
					margin-bottom: 0px !important;
					padding-top: 100px !important;
					padding-bottom: 100px !important;
					background-image: url(https://i.imgur.com/zq4atZG.jpg) !important;
					}
					.vc_custom_1444276882986 {
					margin-bottom: 0px !important;
					}
					.vc_custom_1444208216484 {
					margin-bottom: 0px !important;
					}
					</style>
					<div class="vc_row wpb_row vc_row-fluid backing vc_custom_1448548346586">
						<div class="row">
							<div class="h-padding-0 wpb_column vc_column_container vc_col-sm-12">
								<div class="wpb_wrapper">
									<div class="vc_row wpb_row vc_inner vc_row-fluid container">
										<div class="row">
											<div class="wpb_column vc_column_container vc_col-sm-12">
												<div class="wpb_wrapper">
													<div class="wpb_widgetised_column wpb_content_element">
														<div class="wpb_wrapper">
															<div class="page-header">
																<h1 class="page-title">
																'.$title.'
																</h1>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="vc_row wpb_row vc_row-fluid vc_custom_1444276882986" style="margin-top: 145px;">
						<div class="row">
							<div class="wpb_column vc_column_container vc_col-sm-12">
								<div class="wpb_wrapper"></div>
							</div>
						</div>
					</div>
					<div class="vc_row wpb_row vc_row-fluid bottom-breadcrumb vc_custom_1444208216484">
						<div class="row">
							<div class="h-padding-0 wpb_column vc_column_container vc_col-sm-12">
								<div class="wpb_wrapper">
									<div class="vc_row wpb_row vc_inner vc_row-fluid container">
										<div class="row">
											<div class="wpb_column vc_column_container vc_col-sm-12">
												<div class="wpb_wrapper">
													<div class="azwoo-breadcrumb">
														<nav class="woocommerce-breadcrumb"><a href="'.url().'">Home</a> <span class="delimiter">/</span> '.$title.'</nav>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		';
		return $html;
	}

	public static function timeslot($id){
		$start = Timeslot::where('id','=',$id)->pluck('start');
		$end = Timeslot::where('id','=',$id)->pluck('end');
		return date('h:i A',strtotime($start)).' - '.date('h:i A',strtotime($end));
	}


	public static function bookingcount($court,$timeslot){
		return 10-Booking::where('timeslot_id','=',$timeslot)
		->where('date','=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
		->where('court','=',$court)
		->where('cancel','=',0)
		->count();
	}

public static function bookingcount1($court,$timeslot){
		return 16-Booking::where('timeslot_id','=',$timeslot)
		->where('date','=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
		->where('court','=',$court)
		->where('cancel','=',0)
		->count();
	}

	public static function bookingdata($id)
	{
		$date = date('d F,Y',strtotime(Booking::where('id','=',$id)->pluck('date')));
		
		$position = Booking::where('id','=',$id)->pluck('position');
		
		$start = Booking::where('bookings.id','=',$id)
		->leftJoin('timeslots as t','t.id','=','bookings.timeslot_id')
		->pluck('start');

		$end = Booking::where('bookings.id','=',$id)
		->leftJoin('timeslots as t','t.id','=','bookings.timeslot_id')
		->pluck('end');

		return $date.'<br>'.date('h:i A',strtotime($start)).' - '.date('h:i A',strtotime($end));

	}



	public static function bookingslotbackend($data){
		$id = Booking::where('timeslot_id','=',Session::get('timeslot'))
		->where('date','=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
		->where('court','=',Session::get('court'))
		->where('position','=',$data['id'])
		->where('cancel','=',0)
		->pluck('user_id');

		
		$name = User::where('id','=',$id)->pluck('name');
		
		$bip = Booking::where('timeslot_id','=',Session::get('timeslot'))
		->where('date','=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
		->where('position','=',$data['id'])
		->pluck('bib_number');

		$bookingid = Booking::where('timeslot_id','=',Session::get('timeslot'))
		->where('date','=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
		->where('position','=',$data['id'])
		->pluck('id');

		$start = Timeslot::where('id','=',Session::get('timeslot'))->pluck('end');

		$available = 'available';

		$paid = Booking::where('timeslot_id','=',Session::get('timeslot'))
		->where('date','=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
		->where('court','=',Session::get('court'))
		->where('position','=',$data['id'])
		->where('cancel','=',0)
		->pluck('paid');

		$class = "info";
		
		if ($paid == 0) {
			$class = "danger";
		}


		if(Timeslot::where('id','=',Session::get('timeslot'))->pluck('block') == 1){
			$available = '';
		}

		if(strtotime(date('Y-m-d H:i:s', strtotime(Session::get('bookingdate').' '.$start))) <= strtotime(\Carbon\Carbon::now()->addMinutes(0)))
		{

			if($id == ''){
			return '<button data-id="'.$data['id'].'" data-player="'.$data['player'].'" class="btn btn-success " style="width:100%;text-align:left; color:white; background-color:green;">'.$data['player'].' (Book Now)</button>';
			}
			else
			{
				return '<button class="btn btn-'.$class.'" style="width:100%;text-align:left">'.$name.' - '.$bip.'</button>';
			}

		}
		else{
			if($id == ''){
				return '<button data-id="'.$data['id'].'" data-player="'.$data['player'].'" class="btn btn-success '.$available.'" style="width:100%;text-align:left; color:white; background-color:green;">'.$data['player'].' (Book Now)</button>';
			}
			else
			{
				return '<button data-id="'.$bookingid.'"  class="bip btn btn-'.$class.'" style="width:100%;text-align:left">'.$name.' - '.$bip.'</button>';
			}
		}


	}

	public static function bookingslot($data){
		$id = Booking::where('timeslot_id','=',Session::get('timeslot'))
		->where('date','=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
		->where('court','=',Session::get('court'))
		->where('position','=',$data['id'])
		->where('cancel','=',0)
		->pluck('user_id');
		
		$name = User::where('id','=',$id)->pluck('name');
		$wwid = User::where('id','=',$id)->pluck('ww_id');


		$start = Timeslot::where('id','=',Session::get('timeslot'))->pluck('end');

		$available = 'available';

		$paid = Booking::where('timeslot_id','=',Session::get('timeslot'))
		->where('date','=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
		->where('court','=',Session::get('court'))
		->where('position','=',$data['id'])
		->where('cancel','=',0)
		->pluck('paid');

		$class = "info";
		
		if ($paid == 0) {
			$class = "danger";
		}


		if(Timeslot::where('id','=',Session::get('timeslot'))->pluck('block') == 1){
			$available = '';
		}

		if(strtotime(date('Y-m-d H:i:s', strtotime(Session::get('bookingdate').' '.$start))) <= strtotime(\Carbon\Carbon::now()->addMinutes(0)))
		{

			if($id == ''){
			return '<button data-id="'.$data['id'].'" data-player="'.$data['player'].'" class="btn btn-success " style="width:100%;text-align:left; color:white; background-color:green;">'.$data['player'].' (Book Now)</button>';
			}
			else
			{
				return '<button  class="btn btn-'.$class.'" style="width:100%;text-align:left">'.$name.' ('.$wwid.')'.'</button>';
			}

		}
		else{
			if($id == ''){
				return '<button  data-id="'.$data['id'].'" data-player="'.$data['player'].'" class="btn btn-success '.$available.'" style="width:100%;text-align:left; color:white; background-color:green;">'.$data['player'].' (Book Now)</button>';
			}
			else
			{
				return '<button  class="btn btn-'.$class.'" style="width:100%;text-align:left">'.$name.' ('.$wwid.')'.'</button>';
			}
		}


	}

	public static function wallet($id=null){
		if($id!=null){
		return Wallet::where('user_id','=',$id)
		->sum('amount');
		}
		return Wallet::where('user_id','=',Auth::user()->id)
		->sum('amount');
	}
	
	public static function points($id=null){
		if($id!=null){
		return Point::where('user_id','=',$id)
		->sum('point');	
		}
		return Point::where('user_id','=',Auth::user()->id)->sum('point');
	}

	public static function pointwithoutresult($id=null){
		if($id!=null){
		return Point::where('user_id','=',$id)
		->sum('without_result');	
		}
		return Point::where('user_id','=',Auth::user()->id)
		->sum('point');
	}

	public static function matches($id=null){
		if($id!=null){
		return ScoreDetails::where('user_id','=',$id)->where('season','=',2)
		->count();	
		}
		return ScoreDetails::where('user_id','=',Auth::user()->id)
		->count(); 
	}

	public static function notifications($id,$limit=null){
		return User::find($id)->getNotifications($limit);
	}

	public static function playerid($id, $country = NULL){
		if($country=='Brunei')
			return 'SSBN'.sprintf('%05d',$id);
		else if($country=='Malaysia')
			return 'SSMY'.sprintf('%05d',$id);
		else 
			return 'SSBN'.sprintf('%05d',$id);
	}

	public static function topscores($limit,$skip = 0)
	{
		return User::where('type','!=',1)
		->leftJoin('score_details','score_details.user_id','=','users.id')
		->where('score_details.season','=',2)
		->where('score_details.match_type','=',Session::get('match_type'))
		->select(['users.*',
                   DB::raw("sum(score_details.goals) as total")
            ])
		->groupBy('users.id')
		->orderBy('total','desc')
		->skip($skip)
		->take($limit)
		->get();
	}

	
	public static function topgoalassist($limit,$skip = 0)
	{
		return User::where('type','!=',1)
		->leftJoin('score_details','score_details.user_id','=','users.id')
		->where('score_details.season','=',2)
		->where('score_details.match_type', Session::get('match_type'))
		->select(['users.*',
                   DB::raw("sum(score_details.assist) as total")
            ])
		->groupBy('users.id')
		->orderBy('total','desc')
		->skip($skip)
		->take($limit)
		->get();
	}

	public static function topgoalkeeper($limit,$skip = 0)
	{
		return User::where('type','!=',1)
		->leftJoin('points','points.user_id','=','users.id')
		->select(['users.*',
                   DB::raw("sum(points.top_goalkeeper) as total")
            ])
		->where('points.top_goalkeeper','>',0)
		->where('points.match_type','=',Session::get('match_type'))
		->groupBy('users.id')
		->orderBy('total','desc')
		->skip($skip)
		->take($limit)
		->get();
	}
	
	public static function topplayers($limit,$skip = 0)
	{
		return User::where('type','!=',1)
		->leftJoin('points','points.user_id','=','users.id')
		->select(['users.*',
                   DB::raw("sum(points.point) as total")
            ])
		->groupBy('users.id')
		->orderBy('total','desc')
		->where('points.match_type', Session::get('match_type'))
		->skip($skip)
		->take($limit)
		->get();
	}

	public static function latestBookings(){
		return Booking::where('user_id','=',Auth::user()->id)
        ->orderBy('date','desc')
		->limit(5)
		->get();
	}

	public static function calculateScore($id){
		$scores = ScoreDetails::where(['id' => $id],['season' => '2'])->get();
		//print_r($scores);
		foreach ($scores as $score) { }
		$result = 0;
		if($score->result == 0){
			$result = 5;
		}			

		else if($score->result == 1){
			$result = 10;
		}
        return $amount = 1+$result+($score->goals_conceded)*(-1)+($score->goals)*(2)+($score->assist)*(1)+($score->clean_sheet)*(3)+($score->red_card)*(-5)+($score->yellow_card)*(-2);
	}

	public static function checkblock()
	{
		return Timeslot::where('id','=',Session::get('timeslot'))->pluck('block');
	}

	public static function score($userid , $what)
	{
		return ScoreDetails::where('user_id','=',$userid)->where('season','=',2)->sum($what);

	}

	public static function blockmsg()
	{
		return Timeslot::where('id','=',Session::get('timeslot'))->pluck('msg');
	}

	public static function teamwin($userid){
		return ScoreDetails::where('user_id','=',$userid)->where('season','=',2)
		->where('result','=',1)->count();
	}

	public static function bib($bib, $team)
	{
		$booked = Booking::where('date', date('Y-m-d',strtotime(Session::get('bookingdate'))))
		->where('timeslot_id', Session::get('timeslot'))
        ->where('team', $team)
        ->where('cancel', 0)
        ->get()
        ->pluck('bib_number');
        
        $booked = json_decode($booked, true);

        if (in_array($bib, $booked)) {
			return "<td class='inactive'  value='$bib'>$bib</td>";
        }
		return "<td value='$bib'>$bib</td>";
	}
	

}
