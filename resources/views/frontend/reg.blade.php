@extends('frontend.template.index')
@section('title','Registration form (Team)')

@section('style')
<style>body {background-color:black;}</style>
@stop

@section('header')
{!!FHelper::breadcrumb('Registration form (Team)')!!}
@stop

@section('content')
<div class="container content"  style="background-color:black">


      <a style="color:white;" href="{{url()}}/public/frontend/images/RBWC_teamreg.pdf" download>

      	Red Bull Warriors Cup Championship registration form is available at our office or you can download the form <b style="color: blue;">HERE</b> and submit the completed form including payment to:<br><br>

      	<b> WEEKEND WARRIORS</b><br>
      	Level 3, iCentre<br>
      	Anggerek Desa Technology Park,<br>
      	Bandar Seri Begawan,<br>
      	BB3713, Brunei Darussalam <br><br>

      	For more info / register, contact:<br>
      	- WA / Call : +673 8178444 (Ulfy) / +673 823 7789<br>
      	- Email : info@wwstadium.com<br>
      	- Or slide through our DM on instagram, @wwstadium<br><br>



</a> 

  <p style="color:white;">Closing date: 29th June 2018 (Friday)<p>

    

</div>
@stop

@section('script')
@stop
