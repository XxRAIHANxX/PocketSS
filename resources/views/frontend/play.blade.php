@extends('frontend.template.nav')
@section('title','Play')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.8.0/fullcalendar.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.8.0/fullcalendar.print.css" media="print">
<script src="http://fullcalendar.io/js/fullcalendar-2.8.0/lib/moment.min.js"></script>

@stop
@section('header')
{!!FHelper::breadcrumb('Lets Play')!!}
@stop
@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<div id='calendar'></div>
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.8.0/fullcalendar.min.js"></script>
<script>
$(document).ready(function() {
	$('#calendar').fullCalendar(
	{
	  	header: {
	  	left : 'Lets Play',
	    center: 'title',
	    right: 'prev,next',
	  	},
	   	editable: true, 
		dayClick: function(date, jsEvent, view ) {
			if($(this).hasClass('disabled')){
			        jsEvent.preventDefault();
			        swal('Booking is allowed only for upcoming weekends.');
			 }
			 else
			 {	
          		window.location.href = '{{url()}}/makebooking/'+date.format('DD-MM-Y');
			 }
	    }      
	}); 
	$('.fc-mon , .fc-tue, .fc-wed , .fc-thu , .fc-fri , .fc-past ').addClass('disabled');
			// $('.fc-content-skeleton tbody').remove();

	$('body').on('click', function(){
		$('.fc-mon , .fc-tue, .fc-wed , .fc-thu , .fc-fri , .fc-past ').addClass('disabled');
		// $('.fc-content-skeleton tbody').remove();
	});
});
</script>
@stop