@extends('layouts.app')

@section('content')

<!-- <style>
    .leaderboard {
	width: 70rem;
	box-shadow: 1px 1px 8px 0 #cccccc;
	background: #ffffff;
	color: #555555;
}

.leaderboard--header {
	width: 100%;
	height: 4rem;
	font-size: 0.75rem;
	background: #33333a;
	color: #eef;
}

.leaderboard--item {
	display: flex;
	flex-flow: row nowrap;
	height: 100%;
	align-items: center;
	border-bottom: 1px solid #cccccf;
}

.leaderboard--item--cell {
	box-sizing: border-box;
	height: 100%;
	padding: 1rem;
	display: flex;
	align-items: center;
}

.leaderboard--item--cell__rank {
	width: 12%;
}

.leaderboard--item--cell__user {
	flex-grow: 1;
}

.leaderboard--item--cell__thirty {
	width: 25%;
}

.leaderboard--item--cell__alltime {
	width: 25%;
}
</style>
 



<div class="container">
<table class="table">
  <thead>
    <tr>
     
    </tr>
  </thead>
  <tbody>
    <tr>
     <td><div class="leaderboard">
		<div class="leaderboard--header">
			<div class="leaderboard--item">
				<div class="leaderboard--item--cell leaderboard--item--cell__rank">
					<span>Rank</span>
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__user">
					<span>User</span>
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__thirty">
					<span>Lencana</span>
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__alltime">
					<span>point</span>
				</div>
			</div>
		</div>
		<div class="leaderboard--list">
			<div class="leaderboard--item">
				<div class="leaderboard--item--cell leaderboard--item--cell__rank">
					1
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__user">
					quincylarson
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__thirty">
					Jurnalis Hot News
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__alltime">
					1024
				</div>
			</div>
			<div class="leaderboard--item">
				<div class="leaderboard--item--cell leaderboard--item--cell__rank">
					2
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__user">
					Andi
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__thirty">
					Jurnalis IT
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__alltime">
					825
				</div>
			</div>
			<div class="leaderboard--item">
				<div class="leaderboard--item--cell leaderboard--item--cell__rank">
					3
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__user">
					Bela
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__thirty">
					Penulis Fasion
				</div>
				<div class="leaderboard--item--cell leaderboard--item--cell__alltime">
					486
				</div>
			</div>
		</div>
	</div></td>
    </tr>
    <tr>
    
    </tr>
  
  </tbody>
</table>
    <div class="">
	
</div>
</div> -->
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header">
                Dashboard
            </div>
            <div class="card-body">
                @role('admin')
                {{ __('You are logged in!') }}
                @endrole

                @role('redaktur')
                @include('redaktur.dashboard-redaktur')
                @endrole

                @role('jurnalis')
                @include('jurnalis.dashboard-jurnalis')
                @endrole

            </div>
        </div>
    </div>
    </div>

	<!-- <button> <label for=""> </label>
		<a href="https://analytics.google.com/analytics/web/">cek traffic </a>
	</button> -->
@endsection
