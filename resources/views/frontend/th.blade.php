@extends('frontend.template.index2') 
@section('title','Registration Thailand') 

@section('style') 
<style>body { 
background-image: url("{{url()}}/public/frontend/images/wwrb.jpg"); 
background-repeat: no-repeat;
background-size: cover;
}

</style>   
@stop

@section('header')
 {!!FHelper::breadcrumb('Registration (Thailand)')!!} 
@stop

@section('content')
 <div class="container content"> 
    


      <p style="color: white">Please click the link below for registration:</p><br>
      <a style = "color:blue; text-decoration: underline" href="https://goo.gl/forms/TvY9NssGQfzUkO402">https://goo.gl/forms/hVvmv1vK7JyQPVBK2</a>




</a> 
 
  
    

</div>
@stop

@section('script') 
@stop
