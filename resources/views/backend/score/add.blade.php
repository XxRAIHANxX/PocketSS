@extends('backend.template.index')
@section('title','Scores')
@section('breadcrumb','Scores')
@section('style')
<link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
@stop
@section('content')
<div class="row">
	<div class="col-md-4">
		<h3 class="">Date: {{Session::get('bookingdate')}}</h3>
	</div>
	<div class="col-md-4 text-center">
		<h3 class="">{{FHelper::timeslot(Session::get('timeslot'))}}</34>
	</div>
	<div class="col-md-4 text-right">
		<h3 class="">Court: {{Session::get('court')}}</h3>
	</div>
</div>
<hr>
@if($players->count() > 0)
<form action="" method="POST">
	<input type="hidden" name="bookingdate" value="{{Session::get('bookingdate')}}">
	<input type="hidden" name="timeslot" value="{{Session::get('timeslot')}}">
	<input type="hidden" name="court" value="{{Session::get('court')}}">
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<select name="match_type" class="form-control" required="">
				<option value="">- Match Type -</option>
				<option value="5v5">5V5</option>
				<option value="8v8">8V8</option>
			</select>
		</div>
		<div class="col-md-6 teamA border-right">
			<h3 class="text-center"><button type="button" class="btn btn-info btn-lg">Team A</button></h3>
			<input type="hidden" id="scoreA" value="3" name="">
			<input type="hidden" id="scoreB" value="3" name="">
			<h4>Result:</h4>
			<label id="loss"><input class="" type="radio" data-score="0" name="teamA[result]" value="-1"> Team Loss</label> &nbsp; &nbsp;
			<label><input class="" type="radio" checked="" data-score="1" name="teamA[result]" value="0"> Team Draw</label> &nbsp; &nbsp;
			<label id="win"><input class="" type="radio" name="teamA[result]" data-score="3" value="1"> Team Win</label>
			<br>
			<hr>
			@foreach($players as $player)
			@if($player->team == 'A')
			<table class="table table-bordered player">
				<tr>
					<td colspan="2"><b>{{$player->position}}. {{$player->name}} ({{FHelper::playerid($player->user_id)}}) - {{$player->player}}</b>
						<button type="button" class="btn btn-outline btn-danger pull-right">{{$player->bib_number}}</button>
						<br>
						<center>
						<br>
						<button type="button" class="btn btn-outline btn-info score">6</button>
						</center>
					</td>
				</tr>
				<input class="" type="hidden" name="teamA[score][{{$player->user_id}}][player_id]" value="{{$player->user_id}}">
				<tr>
					<td>Red Cards</td>
					<td><input class="number"  data-score="-3" name="teamA[score][{{$player->user_id}}][red]" type="text" value="0"></td>
				</tr>
				<tr>
					<td>Yellow Cards</td>
					<td><input class="number" data-score="-1" type="text" name="teamA[score][{{$player->user_id}}][yellow]" value="0"></td>
				</tr>
				<?php
				$hidden = 'hidden';
				$goal = '';
				?>
				@if($player->type_id == 1) 
				<?php
				$hidden = '';
				$goal = '';
				?>
				@endif
				<tr class="{{$goal}}">
					<td class="{{$goal}}">Goals Scored</td>
					<td class="{{$goal}}"><input  data-score="2" class="number" type="text" name="teamA[score][{{$player->user_id}}][goal]" value="0"></td>
				</tr>
				<tr class="{{$hidden}}">
					<td class="{{$hidden}}">Goals Conceded</td>
					<td class="{{$hidden}}"><input class="number"  data-score="-1" type="{{$hidden}}" name="teamA[score][{{$player->user_id}}][goal_conceded]" value="0"></td>
				</tr>
				<tr class="{{$hidden}}">
					<td class="{{$hidden}}">Goals Saved</td>
					<td class="{{$hidden}}"><input class="number" data-score="1" type="{{$hidden}}" name="teamA[score][{{$player->user_id}}][clean_sheet]" value="0"></td>
				</tr>
				<tr>
					<td>Assists</td>
					<td><input class="number" type="text" name="teamA[score][{{$player->user_id}}][assist]"  data-score="1" value="0"></td>
				</tr>
			</table>
			<hr>
			@endif
			@endforeach
		</div>
		<div class="col-md-6 teamB">
			<h3 class="text-center"><button type="button" class="btn btn-info btn-lg">Team B</button></h3>
			<div style="opacity:0">
				<h4>Result:</h4>
				<label><input class="" type="radio" name="teamB[result]" value="-1"> Team Loss</label> &nbsp; &nbsp;
				<label><input class="" type="radio" checked="" name="teamB[result]" value="0"> Team Draw</label> &nbsp; &nbsp;
				<label><input class="" type="radio" name="teamB[result]" value="1"> Team Win</label>
			</div>
			<hr>
			@foreach($players as $player)
			@if($player->team == 'B')
			<table class="table table-bordered player">
				<tr>
					<td colspan="2"><b>{{$player->position}}. {{$player->name}} ({{FHelper::playerid($player->user_id)}}) - {{$player->player}}</b>
						<button type="button" class="btn btn-outline btn-danger pull-right">{{$player->bib_number}}</button>
						<br>
						<center>
						<br>
						<button type="button" class="btn btn-outline btn-info score">6</button>
						</center>
					</td>
				</tr>
				<input class="" type="hidden" name="teamB[score][{{$player->user_id}}][player_id]" value="{{$player->user_id}}">
				<tr>
					<td>Red Cards</td>
					<td><input class="number"  data-score="-3" name="teamB[score][{{$player->user_id}}][red]" type="text" value="0"></td>
				</tr>
				<tr>
					<td>Yellow Cards</td>
					<td><input class="number" data-score="-1" type="text" name="teamB[score][{{$player->user_id}}][yellow]" value="0"></td>
				</tr>
				<?php
				$hidden = 'hidden';
				$goal = '';
				?>
				@if($player->type_id == 1)
				<?php
				$hidden = '';
				$goal = '';
				?>
				@endif
				<tr class="{{$goal}}">
					<td class="{{$goal}}">Goals Scored</td>
					<td class="{{$goal}}"><input  data-score="2" class="number" type="text" name="teamB[score][{{$player->user_id}}][goal]" value="0"></td>
				</tr>
				<tr class="{{$hidden}}">
					<td class="{{$hidden}}">Goals Conceded</td>
					<td class="{{$hidden}}"><input class="number"  data-score="-1" type="{{$hidden}}" name="teamB[score][{{$player->user_id}}][goal_conceded]" value="0"></td>
				</tr>
				<tr class="{{$hidden}}">
					<td class="{{$hidden}}">Goals Saved</td>
					<td class="{{$hidden}}"><input class="number" data-score="1" type="{{$hidden}}" name="teamB[score][{{$player->user_id}}][clean_sheet]" value="0"></td>
				</tr>
				<tr>
					<td>Assists</td>
					<td><input class="number" type="text" name="teamB[score][{{$player->user_id}}][assist]"  data-score="1" value="0"></td>
				</tr>
			</table>
			<hr>
			@endif
			@endforeach
		</div>
		<div class="col-md-12 text-center">
			{{csrf_field()}}
			<button type="submit" class="btn btn-info btn-lg">Calculate & Assign Scores</button>
		</div>
	</div>
</form>
@else
<h1 class="text-center">No Player in Match!</h1>
@endif
<div class="margin-top"></div>
@stop
@section('script')
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script>
$(document).ready(function(){
	$('input[name="teamA[result]"]').on('change',function(){
		if($(this).val() == '0'){
			$('#win').removeClass('hidden');
			$('#loss').removeClass('hidden');
			$('input[name="teamB[result]"][value=0]').prop('checked','true');
			$('.teamA .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)-parseInt($('#scoreA').val()))
			});
			$('.teamB .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)-parseInt($('#scoreB').val()))
			});
			$('#scoreA').val(3);
			$('#scoreB').val(3);
		}
		else if($(this).val() == '-1'){
			$('#win').addClass('hidden');
			$('input[name="teamB[result]"][value=1]').prop('checked','true');
			$('.teamA .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current))
			});
			$('.teamB .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)+parseInt($('#scoreB').val()))
			});
			$('#scoreA').val(0);
			$('#scoreB').val(3);
		}
		else if($(this).val() == '1'){
			$('#loss').addClass('hidden');
			$('input[name="teamB[result]"][value=-1]').prop('checked','true');
			$('.teamA .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)+parseInt($('#scoreA').val()))
			});
			$('.teamB .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current))
			});
			$('#scoreA').val(3);
			$('#scoreB').val(0);
		}
	});
	$('input[name="teamB[result]"]').on('change',function(){
		if($(this).val() == '0'){
			$('input[name="teamA[result]"][value=0]').prop('checked','true');
			$('.teamA .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)+5-parseInt($('#scoreA').val()))
			});
			$('.teamB .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)+5-parseInt($('#scoreB').val()))
			});
			$('#scoreA').val(5);
			$('#scoreB').val(5);
		}
		else if($(this).val() == '-1'){
			$('input[name="teamA[result]"][value=1]').prop('checked','true');
			$('.teamA .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)+10-parseInt($('#scoreA').val()))
			});
			$('.teamB .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)+parseInt($('#scoreB').val()))
			});
			$('#scoreA').val(0);
			$('#scoreB').val(10);
		}
		else if($(this).val() == '1'){
			$('input[name="teamA[result]"][value=-1]').prop('checked','true');
			$('.teamA .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)-parseInt($('#scoreA').val()))
			});
			$('.teamB .score').each(function(){
				current = $(this).html();
				$(this).html(parseInt(current)+10-parseInt($('#scoreB').val()))
			});
			$('#scoreA').val(10);
			$('#scoreB').val(0);
		}
	});
	
	i = $(".number").TouchSpin({
		buttondown_class:"btn btn-danger",
		buttonup_class:"btn btn-success",
		mousewheel: false,
	});
	});


	$('.number').on('touchspin.on.startupspin',function(){
		if($(this).parents('.input-group').find('.number').val() == 1 ){
			$(this).parents('.bootstrap-touchspin').find('.bootstrap-touchspin-down').prop('disabled', false);
		}
		score = $(this).parents('.bootstrap-touchspin').find('.number').data('score');
		val = $(this).parents('.bootstrap-touchspin').find('.number').val();
		current = $(this).parents('.player').find('.score').html();
		$(this).parents('.player').find('.score').html(parseInt(current)+(parseInt(score)));
	});


	$('.number').on('touchspin.on.startdownspin',function(){
		if($(this).parents('.input-group').find('.number').val() == 0 ){
			$(this).parents('.bootstrap-touchspin').find('.bootstrap-touchspin-down').prop('disabled', true);
		}
		score = $(this).parents('.bootstrap-touchspin').find('.number').data('score');
		val = $(this).parents('.bootstrap-touchspin').find('.number').val();
		current = $(this).parents('.player').find('.score').html();
		$(this).parents('.player').find('.score').html(parseInt(current)-parseInt(score));
	});

</script>
@stop