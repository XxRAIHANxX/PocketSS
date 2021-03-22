@extends('frontend.template.nav')
@section('title','Home')
@section('style')

<style>
body {
	background: url("{{url()}}/public/frontend/images/2021/bg-1.png")no-repeat center bottom fixed;
	background-color:white;
  	-webkit-background-size: 100% auto;
  	-moz-background-size: 100% auto;
  	-o-background-size: 100% auto;
  	background-size: 100% auto;
  	background-attachment: scroll;
  	height: 100%;
}

.jumbotron {
	background-color: rgb(0, 0, 0);
	padding: 2px;
	margin: 2px;
	opacity: 0.5;
</style>
@stop
@section('content')
<div class="container" style="align-content: center;padding: 30px;">
	<section style="text-align: center;padding: 15px;color: black;" >
		<br />
			<img src="{{url()}}/public/frontend/images/2021/tagline.png" class="center-block mg-sm" width="" height=""/>
		<br /><br />
			<div class="col-md-4" style="padding-top:10px;padding-bottom:10px;">
				<h2 style="align-content: center;">Peak Performance</h2>
				<h4 style="align-content: center;">OUTDOOR FOOTBALL 9v9</h4>
				<h4 style="align-content: center;">7:00PM - 9:00PM</h4>
				<form>
					<div class="form-group">
						<select name="book-games" id="book-games-peak" class="form-control" accesskey="target">
							<option value='none' selected>- Peak Performance -</option>
							/* <option value="{{url()}}/ppsb/timeslot1">MON 15 Mar</option>
							<option value="{{url()}}/ppsb/timeslot2">WED 17 Mar</option>
							<option value="{{url()}}/ppsb/timeslot3">FRI 19 Mar</option> */
						</select>
					</div>
					<input type=button value="  Book Now &raquo;  " onclick="goToPeakPage()" style="background-color: #D7FF00;" />
				</form>
			</div>
			
			<div class="col-md-4" style="padding-top:10px;padding-bottom:10px;">
				<h2 style="align-content: center;">UBD</h2>
				<h4 style="align-content: center;">OUTDOOR FOOTBALL 9v9</h4>
				<h4 style="align-content: center;">Coming Soon</h4>
				<form>
					<div class="form-group">
						<select name="book-games" id="book-games-ubd" class="form-control" accesskey="target">
							<option value='none' selected>- Coming Soon -</option>
							
						</select>
					</div>
					
				</form>
			</div>
			
			<div class="col-md-4" style="padding-top:10px;padding-bottom:10px;">
				<h2 style="align-content: center;">ISB</h2>
				<h4 style="align-content: center;">OUTDOOR FOOTBALL 9v9</h4>
				<h4 style="align-content: center;">Coming Soon</h4>
				<form>
					<div class="form-group">
						<select name="book-games" id="book-games-isb" class="form-control" accesskey="target">
							<option value='none' selected>- Coming Soon -</option>
							
						</select>
					</div>
					
				</form>
			</div>
			<br /><br />
			<img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
			<div class="wpb_wrapper">
				<div class=" vc_col-sm-12">
					<div class="carousel slide" align="center" data-contents-per-item="1" data-margin="0" data-autoplay="" data-center="" data-loop="" data-responsive="carousel-13112897">
						<div class="entry " >
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<img  style="cursor:pointer;"  onClick="" src="{{url()}}/public/frontend/images/2021/bg-2.png" alt="How to play"/>
									</div>
									<div class="item embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YJT5pi19lAg" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
								</div>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
					<script type="text/javascript">window["carousel-13112897"] = [{"items":"1"}];</script>
				</div>
			</div>
			<img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
		<br /><br />
	</section>
</div>
@stop
@section('script')
	<script src="{{url()}}/public/frontend/css/revslider/jquery.themepunch.revolution.min.js"></script>
	<script src="{{url()}}/public/frontend/css/revslider/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript">
		function goToPeakPage()
		{
			var url = document.getElementById('book-games-peak').value;
			if(url != 'none') {
				window.location = url;
			}
		}
	</script>
	<script type="text/javascript">
		function goToUbdPage()
		{
			var url = document.getElementById('book-games-ubd').value;
			if(url != 'none') {
				window.location = url;
			}
		}
	</script>
	<script type="text/javascript">
		function goToIsbPage()
		{
			var url = document.getElementById('book-games-isb').value;
			if(url != 'none') {
				window.location = url;
			}
		}
	</script>
	<script type="text/javascript">
		/* Provider:  - *****************************************
		- PREPARE PLACEHOLDER FOR SLIDER  -
		******************************************/
		var setREVStartSize=function(){
		try{var e=new Object,i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
		e.c = jQuery('#rev_slider_1_1');
		e.responsiveLevels = [1240,1024,778,778];
		e.gridwidth = [1170,970,750,480];
		e.gridheight = [800,800,800,600];
		e.sliderLayout = "auto";
		if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
		}catch(d){console.log("Failure at Presize of Slider:"+d)}
		};
		setREVStartSize();
		var tpj=jQuery;
		var revapi1;
		tpj(document).ready(function() {
		if(tpj("#rev_slider_1_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_1_1");
		}else{
		revapi1 = tpj("#rev_slider_1_1").show().revolution({
		sliderType:"standard",
		jsFileLocation:"http://azexo.com/sportak/wp-content/plugins/revslider/public/assets/js/",
		sliderLayout:"auto",
		dottedOverlay:"none",
		delay:12000,
		navigation: {
		keyboardNavigation:"off",
		keyboard_direction: "horizontal",
		mouseScrollNavigation:"off",
		onHoverStop:"off",
		arrows: {
		style:"hermes",
		enable:true,
		hide_onmobile:false,
		hide_onleave:false,
		tmp:'<div class="tp-arr-allwrapper">  <div class="tp-arr-imgholder"></div>  <div class="tp-arr-titleholder"></div>  </div>',
		left: {
		h_align:"left",
		v_align:"center",
		h_offset:0,
		v_offset:0
		},
		right: {
		h_align:"right",
		v_align:"center",
		h_offset:0,
		v_offset:0
		}
		}
		},
		responsiveLevels:[1240,1024,778,778],
		gridwidth:[1170,970,750,480],
		gridheight:[800,800,800,600],
		lazyType:"none",
		shadow:0,
		spinner:"spinner0",
		stopLoop:"off",
		stopAfterLoops:-1,
		stopAtSlide:-1,
		shuffle:"off",
		autoHeight:"off",
		disableProgressBar:"on",
		hideThumbsOnMobile:"off",
		hideSliderAtLimit:0,
		hideCaptionAtLimit:0,
		hideAllCaptionAtLilmit:0,
		startWithSlide:0,
		debugMode:false,
		fallbacks: {
		simplifyAll:"off",
		nextSlideOnWindowFocus:"off",
		disableFocusListener:"off",
		}
		});
		}
		});
	</script>
@stop