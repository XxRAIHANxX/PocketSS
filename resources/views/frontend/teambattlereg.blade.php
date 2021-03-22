@extends('frontend.template.index')

@section('title','TEAM BATTLE')

@section('style')

@stop

@section('header')
{!!FHelper::breadcrumb('TEAM BATTLE')!!}
@stop

@section('style')
<link rel="stylesheet" href="{{url()}}/public/frontend/css/sweetalert.min.css">
@stop

@section('script')
<script src="{{url()}}/public/frontend/js/sweetalert.min.js"></script>
<script type="text/javascript">
$('#reg_btn').prop('disabled',true);
function docheck()
{
if($('#agree').prop('checked')) 
   $('#reg_btn').prop('disabled',false);
else 
   $('#reg_btn').prop('disabled',true);
}

function doRegisterTB()
{
  var email = $('#email').val();
  var team_name = $('#team_name').val();
  var company_name = $('#company_name').val();
  
  var postTo = 'vendor/teambattle/controller.php?action=7';
  $.ajax({
    type:    "POST",
    url:     postTo,
    data: {email:email, team_name:team_name, company_name:company_name},
    success: function(data) {
      if(data==="SUCCESS")
      {
        alert('Thank you for your registration');
        //swal("Team Battle", "Thank you for your registration.", "success");
        window.location="/";  
      }
      else if(data==="EXIST")
      {
        alert('Account already exist.');

      }
    },
    error:   function(jqXHR, textStatus, errorThrown) {
      alert("Error, status = " + textStatus + ", " +
          "error thrown: " + errorThrown
      );
    }
  });
  return false; 
}
</script>
@stop

@section('content')
    @foreach (['error', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
  <script src="{{url()}}/public/frontend/js/sweetalert.min.js"></script>
        <script>
            alert('Thank you for your registration');
        </script>
        @endif
    @endforeach

<div style="text-align:center; background-color:black">

  
  <div class="container">
<img src="{{url()}}/public/frontend/images/whatistb.jpg" width="1199" height="411" alt=""/>
<img src="{{url()}}/public/frontend/images/howitworks.jpg" width="1199" height="463" alt=""/>
<img src="{{url()}}/public/frontend/images/leaderboards.jpg" width="1200" height="437" alt=""/>
<!-- <img src="{{url()}}/public/frontend/images/tb05_s1.jpg" width="1200" height="437" alt=""/> -->

  <div class="col-md-12" style="background-size:auto; background-repeat:no-repeat; background-image:url('{{url()}}/public/frontend/images/tb01_sample_s1.jpg')">
    <table width="100%"  border="0" cellpadding="2" >
  <tbody>
    <tr>
      <td width="60">&nbsp;</td>
      <td width="190">&nbsp;</td>
      <td width="497">&nbsp;</td>
    </tr>
    <tr>
      <td width="60">&nbsp;</td>
      <td width="190">&nbsp;</td>
      <td width="497">&nbsp;</td>
    </tr>
    <tr>
      <td height="135">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="169">&nbsp;</td>
      <td>&nbsp;</td>
      <td rowspan="2" align="left" valign="top"><table width="70%" border="0" cellspacing="2" cellpadding="10">
        <tbody>
  <form action="{{url()}}/registerTeam" method="POST" role="form">
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>

          <tr>
            <td><input required="" type="text" name="team_name" class="form-control" id="team_name" placeholder="Team Name"></td>
          </tr>
    <tr><td>&nbsp;</td></tr>

          <tr>
            <td><input type="text" name="company_name" class="form-control" id="company_name" placeholder="Company name (optional)"></td>
          </tr>
    <tr><td>&nbsp;</td></tr>

          <tr>
            <td><input required="" type="text" name="email" class="form-control" id="email" placeholder="E-mail Address"></td>
          </tr>
    <tr><td>&nbsp;</td></tr>

          <tr>
            <td>      <!-- <select class="form-control" id="package_list" name="package_list">
                    <option value="">-Package-</option>
                    <option value="Gold">Gold B$ 350</option>
                    <option value="Silver">Silver B$ 250 </option>
                </select> --> <input type="hidden" value="280" id="package_list" name="package_list" />
    <label style="color:white"><input type="checkbox" onclick="docheck()" style="width:25px; height:25px;" id="agree" name="agree" />&nbsp;Season fees B$280 inclusive of 8 x team bibs </label>
      </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>

            <td align="right" >
    {{csrf_field()}}
    <button type="button" onClick="doRegisterTB()" id="reg_btn" class="btn btn-success">REGISTER</button>
      </td>
          </tr>
      </form>

        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="205">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>

  </div>

</div>

@stop

@section('script')

@stop