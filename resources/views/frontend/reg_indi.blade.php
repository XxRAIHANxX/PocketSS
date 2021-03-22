@extends('frontend.template.index2') 
@section('title','Registration form (Individual)') 

@section('style') 
<style>body { 
background-image: url("{{url()}}/public/frontend/images/wwrb.jpg"); 
background-repeat: no-repeat;
background-size: cover;
}

</style>   
@stop

@section('header')
 {!!FHelper::breadcrumb('Registration form (Individual)')!!} 
@stop

@section('content')
 <div class="container content"> 
    


      <a style="color:white;" href="{{url()}}/public/frontend/images/RBWC_individual.pdf" download>

      	Red Bull Warriors Championship Individual registration form is available at our office or you can download the form <b style="color: blue;">HERE</b> and submit the completed form including payment to:<br><br>

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
 
  
    

</div>
@stop

@section('script') 
@stop
