<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ScoreDetails;
use App\Booking;
use App\Point;
use Notifynder;
use Session;
use Auth;

use App\Http\Controllers\Controller;

class ScoreController extends Controller
{

    public function addscores(Request $request)
    {   

        $exist = ScoreDetails::where('timeslot_id','=',Session::get('timeslot'))
        ->where('court' ,'=', Session::get('court'))
        ->where('created_at','>=',date('Y-m-d'.' 00:00:00',strtotime(Session::get('bookingdate'))))
        ->where('created_at','<=',date('Y-m-d'.' 23:59:59',strtotime(Session::get('bookingdate'))))
        ->count();

        if($exist > 0){
            $request->session()->flash('danger','Score distributed already!');
            return redirect()->back();
        }

        if($request->isMethod('POST'))
        {
            if(isset($request->input('teamA')['score'])){
                $teamAGoals = 0;
                foreach ($request->input('teamA')['score'] as $key => $player) {
                    $teamAGoals += $player['goal'];
                }
                $teamBGoals = 0;
                foreach ($request->input('teamB')['score'] as $key => $player) {
                    $teamBGoals += $player['goal'];
                }


                foreach ($request->input('teamA')['score'] as $key => $player) {
                    $sd = new ScoreDetails;
                    $sd->user_id = $player['player_id'];
                    $sd->team = 'A';
                    $sd->result = $request->input('teamA')['result'];
                    $sd->goals = $player['goal'];
                    $sd->goals_conceded = $player['goal_conceded'];
                    $sd->clean_sheet = $player['clean_sheet'];
                    $sd->red_card = $player['red'];
                    $sd->yellow_card = $player['yellow'];
                    $sd->assist = $player['assist'];
                    $sd->timeslot_id = $request->timeslot;
                    $sd->created_at = date('Y-m-d 00:00:00',strtotime($request->bookingdate));
                    $sd->court = $request->court;
                    $sd->match_type = $request->match_type;
                    $sd->save();
    
                    $result = 0;
                    if($request->input('teamA')['result'] == 1){
                    $result = 3;
                    }
                    if($request->input('teamA')['result'] == 0){
                    $result = 1;
                    }
    
                    $amount = 2+$result+($player['goal_conceded'])*(-1)+($player['goal'])*(2)+($player['assist'])*(1)+($player['clean_sheet'])*(3)+($player['red'])*(-3)+($player['yellow'])*(-1);

                    if ($amount < 0) {
                        $amount = 0;
                    }

                    $goalkeeper = 0;
                    
                    $date = date('Y-m-d',strtotime($sd->created_at));
                    
                    $position = Booking::where('date','=',$date)
                    ->where('user_id','=',$sd->user_id)
                    ->pluck('position');

                    if ($position == 1 || $position == 6) {   
                    $goalkeeper = 2+$result+($player['goal'])*(2)+($player['goal_conceded'])*(-1)+($player['assist'])*(1)+($player['clean_sheet'])*(3)+($player['red'])*(-3)+($player['yellow'])*(-1);
                    }

                    $topplayer = 2+$result+($player['goal'])*(2)+($player['assist'])*(1)+($player['red'])*(-3)+($player['yellow'])*(-1);


                    if ($topplayer < 0) {
                        $topplayer = 0;
                    }

                    if ($goalkeeper < 0) {
                        $goalkeeper = 0;
                    }
    
                    $point = New Point;
                    $point->point = $amount-$teamBGoals;
                    $point->top_scorer = $topplayer;
                    $point->top_goalkeeper = $goalkeeper;
                    $point->user_id = $sd->user_id;
                    $point->match_type = $request->match_type;
                    $point->save();
    
    
                    Notifynder::category('addpoint')
                   ->from(Auth::user()->id)
                   ->to($player['player_id'])
                   ->url('points')
                   ->extra(compact('amount'))
                   ->send();


    
                }
            }
            if(isset($request->input('teamB')['score'])){
                foreach ($request->input('teamB')['score'] as $key => $player) {
                    $sd = new ScoreDetails;
                    $sd->user_id = $player['player_id'];
                    $sd->team = 'B';
                    $sd->result = $request->input('teamB')['result'];
                    $sd->goals = $player['goal'];
                    $sd->goals_conceded = $player['goal_conceded'];
                    $sd->clean_sheet = $player['clean_sheet'];
                    $sd->red_card = $player['red'];
                    $sd->yellow_card = $player['yellow'];
                    $sd->assist = $player['assist'];
                    $sd->timeslot_id = $request->timeslot;
                    $sd->created_at = date('Y-m-d 00:00:00',strtotime($request->bookingdate));
                    $sd->court = $request->court;
                    $sd->match_type = $request->match_type;
                    $sd->save();
    
                    $result = 0;
                    if($request->input('teamB')['result'] == 1){
                        $result = 3;
                    }
                    if($request->input('teamB')['result'] == 0){
                        $result = 1;
                    }
    
                    $amount = 2+$result+($player['goal_conceded'])*(-1)+($player['goal'])*(2)+($player['assist'])*(1)+($player['clean_sheet'])*(3)+($player['red'])*(-3)+($player['yellow'])*(-1);

                    if ($amount < 0) {
                        $amount = 0;
                    }

                    $goalkeeper = 0;
                    
                    $date = date('Y-m-d',strtotime($sd->created_at));
                    
                    $position = Booking::where('date','=',$date)
                    ->where('user_id','=',$sd->user_id)
                    ->pluck('position');

                    if ($position == 1 || $position == 6) {   
                    $goalkeeper = 2+$result+($player['goal'])*(2)+($player['goal_conceded'])*(-1)+($player['assist'])*(1)+($player['clean_sheet'])*(3)+($player['red'])*(-3)+($player['yellow'])*(-1);
                    }

                    $topplayer = 2+$result+($player['goal'])*(2)+($player['assist'])*(1)+($player['red'])*(-3)+($player['yellow'])*(-1);
                    
                    if ($goalkeeper < 0) {
                        $goalkeeper = 0;
                    }

                    if ($topplayer < 0) {
                        $topplayer = 0;
                    }

    
                    $point = New Point;
                    $point->point = $amount-$teamAGoals;
                    $point->user_id = $sd->user_id;
                    $point->match_type = $request->match_type;
                    $point->save();
    
    
                    Notifynder::category('addpoint')
                   ->from(Auth::user()->id)
                   ->to($player['player_id'])
                   ->url('points')
                   ->extra(compact('amount'))
                   ->send();


    
                }
            }
            $request->session()->flash('success','Score distributed successfully!');
            return redirect('backend/scores');

        }
        $players = Booking::where([
            'timeslot_id'=>Session::get('timeslot'),
            'court'=>Session::get('court'),
        ])
        ->where('bookings.date','>=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
        ->where('bookings.date','<=',date('Y-m-d',strtotime(Session::get('bookingdate'))))
        ->where('bookings.cancel','=',0)
        ->leftJoin('users as u','u.id','=','bookings.user_id')
        ->leftJoin('player_types as pt','pt.id','=','bookings.player_type')
        ->get(['bookings.*','u.name','u.email','pt.type as player','pt.id as type_id']);
        return view('backend.score.add',['players'=>$players]);
    }
}
