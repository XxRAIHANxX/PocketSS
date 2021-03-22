{{-- <div class="row">
	<div class="col-md-offset-9 col-md-3">
		<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="form-control">
			<option value="#">Select Category</option>
			<option @if(URL::current() == url().'/ranking/goal-keeper') selected @endif value="{{url()}}/ranking/goal-keeper">Top Goal Keeper</option>
			<option @if(URL::current() == url().'/ranking/goal-assist') selected @endif value="{{url()}}/ranking/goal-assist">Top Goal Assist</option>
			<option @if(URL::current() == url().'/ranking/top-scorer') selected @endif value="{{url()}}/ranking/top-scorer">Top Scorers</option>
			<option @if(URL::current() == url().'/ranking/top-player') selected @endif value="{{url()}}/ranking/top-player">Top Players</option>
		</select>
	</div>
</div>
--}}
<div class="container-fluid">
	<div class="category text-center">
		<div class="col-md-3">
			<div class="border1">
				<a href="{{url()}}/ranking/goal-keeper">
					@foreach(FHelper::topgoalkeeper(1) as $scorer)
					<img src="{{url()}}/{{$scorer->pic}}" alt="" class="">
					<h3>{{$scorer->name}}</h3>
					@endforeach
					<h5>Top Goal Keeper</h5>
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="border1">
				<a href="{{url()}}/ranking/goal-assist">
					@foreach(FHelper::topgoalassist(1) as $scorer)
					<img src="{{url()}}/{{$scorer->pic}}" alt="" class="">
					<h3>{{$scorer->name}}</h3>
					<h5>Top Goal Assist</h5>
					@endforeach
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="border1">
				<a href="{{url()}}/ranking/top-scorer">
					@foreach(FHelper::topscores(1) as $scorer)
					<img src="{{url()}}/{{$scorer->pic}}" alt="" class="">
					<h3>{{$scorer->name}}</h3>
					<h5>Top Scorers</h5>
					@endforeach
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="border1">
				<a href="{{url()}}/ranking/top-player">
					@foreach(FHelper::topplayers(1) as $scorer)
					<img src="{{url()}}/{{$scorer->pic}}" alt="" class="">
					<h3>{{$scorer->name}}</h3>
					<h5>Top Player</h5>
					@endforeach
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>