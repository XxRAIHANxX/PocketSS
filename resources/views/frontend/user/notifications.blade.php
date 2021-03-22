<?php
if(!isset($_GET['page'])){
	$_GET['page'] = 1;
}
$notifications = Notifynder::getAll(Auth::user()->id,10,$_GET['page']);
?>
@extends('frontend.template.nav')
@section('title','Notifications')
@section('style')
@stop
@section('header')
{!!FHelper::breadcrumb('Notifications')!!}
@stop
@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-12">
			<h3>Notifications</h3>
			<div class="margin-top"></div>
			<table class="table table-striped table-hover">
				<tr>
					<th>Notification</th>
					<th>Time</th>
				</tr>
				@foreach($notifications as $notification)
				<tr>
					<td><a href="{{url()}}/{{$notification->url}}">{{$notification->text}}</a></td>
					<td>
						<i class="fa fa-calendar"></i> {{date('d F,Y',strtotime($notification->created_at))}} <br>
						<i class="fa fa-clock-o"></i> {{date('h:i A',strtotime($notification->created_at))}}
					</td>
				</tr>
				@endforeach
			</table>
			<div class="text-center">{!! $notifications->render() !!}</div>
		</div>
	</div>
</div>
@stop
@section('script')
@stop
<?php App\User::find(Auth::user()->id)->readAllNotifications(); ?>
