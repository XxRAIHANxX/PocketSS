@extends('frontend.template.index')
@section('title','About Us')
@section('header')
{!!FHelper::breadcrumb('About Us')!!}
@stop
@section('style')
@stop
@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-12">
			<h1>What's Weekend Warriors?</h1>

			<p class="text-justify">
				<img src="{{url()}}/logo.png" alt="" class="img-thumbnail pull-left" style="margin:0 20px 0 0">
				Weekend Warriors is an sports court booking and innovative competition scoring platform where we make playing futsal a lot more fun.
			</p>
			<p class="text-justify">
			We realize how this hectic world has limited our time and opportunities to pursue our passion. WW is the first online offline base, innovative futsal platform to offers the convenience of playing futsal without the problems of venue, team, referee, equipment, etcs.</p>
			<p class="text-justify">On top of that WW is also an online multiplayer gaming platform in which players can earn points upon each game play to climb their own leader board. It is also plan to evolve into a community building direction where players can form teams from inviting other players to do team challenge in the coming future.
</p>
		</div>
	</div>
</div>
@stop
@section('script')
@stop