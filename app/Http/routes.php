<?php


Route::group(['prefix' => '/backend', 'namespace' => 'backend', 'middleware' => 'guest'], function () {
	Route::any('/', 'AdminController@login');
	Route::any('/login', 'AdminController@login');
	Route::any('/forget', 'AdminController@forget');
});

Route::group(['prefix' => '/backend', 'namespace' => 'backend', 'middleware' => 'admin'], function () {

	Route::any('/', function () {
		return view('backend.index');
	});

	Route::any('/setdate/{date}', function ($date) {
		Session::put('bookingdate', $date);
	});

	Route::any('/users/data', 'AdminController@usersdata');
	Route::any('/users/add', 'AdminController@adduser');
	Route::any('/users/manage', 'AdminController@viewusers');
	Route::any('/users/delete/{id}', 'AdminController@deleteuser');
	Route::any('/users/profile/{id}', 'AdminController@profile');
	Route::any('/users/check/{email}', 'AdminController@checkuser');

	Route::any('/bookings', 'AdminController@viewbooking');
	Route::any('/bookings/data', 'AdminController@bookingdata');
	Route::any('/bookings/make', 'AdminController@makebooking');
	Route::any('/bookings/slot/{slotid}/court/{courtid}', 'AdminController@confirmbooking');

	Route::any('/bookings/confirm', 'AdminController@confirm');
	Route::any('/bookings/pending', 'BookingController@pending');
	Route::any('/bookings/pending/data', 'BookingController@pendingdata');
	Route::post('/bookings/pending/pay/{id}', 'BookingController@payforpending');
	Route::any('/bookings/confirmation/{position}', 'AdminController@confirmation');
	Route::any('/bookings/assignbip', 'AdminController@assignbip');

	Route::any('/wallet', 'AdminController@viewwallet');
	Route::any('/wallet/data', 'AdminController@walletdata');

	Route::any('/wallet/requests', 'AdminController@viewcreditrequest');
	Route::any('/wallet/request/cancel/{id}', 'AdminController@cancelcreditrequest');
	Route::any('/wallet/requests/data', 'AdminController@creditrequestdata');

	Route::any('/wallet/confirm/{id}', 'AdminController@addwallet');


	Route::any('/scores/timeslot/{timeslot}/court/{court}', 'AdminController@setplayers');
	Route::any('/scores', 'AdminController@viewpoints');
	Route::any('/scores/add', 'ScoreController@addscores');

	Route::any('/points/data', 'AdminController@pointsdata');
	Route::any('/points/confirm/{id}', 'AdminController@addpoints');


	Route::any('/timeslot', 'AdminController@timeslot');
	Route::any('/timeslot/block/{timeslotID}', 'AdminController@timeslotblock');
	Route::any('/timeslot/blockmsg/{timeslotID}', 'AdminController@timeslotblockmsg');
	Route::any('/{table}/delete/{id}', 'AdminController@delete');
	Route::any('/notifications', 'AdminController@notifications');
	Route::any('/fetch/notifications', 'AdminController@notificationdata');
	Route::any('/profile', 'AdminController@adminprofile');
	Route::any('/logout', 'AdminController@logout');
});



Route::group(['prefix' => '/', 'namespace' => 'frontend'], function () {
	Route::any('/makebooking/{date}', 'BookingController@make');
	Route::any('/makebooking1/{date}', 'BookingController1@make');
	Route::any('/makebooking2/{date}', 'BookingController2@make');
	Route::any('/makebooking3/{date}', 'BookingController3@make');
	Route::any('/makebooking4/{date}', 'BookingController4@make');
	Route::any('/timeslot', 'BookingController@timeslot'); 			//02-01-2017
	Route::any('/timeslot1', 'BookingController2021a@timeslot');	//'BookingController1@timeslot' or 'BookingController2021a@timeslot'	
	Route::any('/timeslot2', 'BookingController2@timeslot');
	Route::any('/timeslot3', 'BookingController3@timeslot');		//02-01-2017
	Route::any('/timeslot4', 'BookingController4@timeslot');
	Route::any('/timeslot1-kk', 'BookingController1_kk@timeslot');
	Route::any('/timeslot2-kk', 'BookingController2_kk@timeslot');
	Route::any('/timeslot3-kk', 'BookingController3_kk@timeslot');
	Route::any('/book', 'BookingController@book');
	Route::any('/book1', 'BookingController1@book');
	Route::any('/book2', 'BookingController2@book');
	Route::any('/book3', 'BookingController3@book');
	Route::any('/book4', 'BookingController4@book');


	Route::get('/', function () {
		return view('frontend.index');
	});
	Route::get('/about', function () {
		return view('frontend.about');
	});
	Route::get('/teambattle', function () {
		return view('frontend.teambattlereg');
	});

	Route::get('/contact', function () {
		return view('frontend.contact');
	});
	Route::post('/contact', 'UserController@contact');
	Route::get('/venue', function () {
		return view('frontend.venue');
	});
	Route::get('/how-to-play', function () {
		return view('frontend.how-to-play');
	});
	Route::get('/play', function () {
		return view('frontend.play');
	});
	Route::get('/ranking', function () {
		return view('frontend.ranking');
	});
	Route::get('/ranking2', function () {
		return view('frontend.ranking2');
	});
	Route::get('/ranking1', function () {
		return view('frontend.ranking1');
	});
	Route::get('/ranking3', function () {
		return view('frontend.ranking3');
	});
	Route::get('/reg', function () {
		return view('frontend.reg');
	});


	Route::get('/reg_indi', function () {
		return view('frontend.reg_indi');
	});
	Route::get('/tnc_indi', function () {
		return view('frontend.tnc_indi');
	});
	Route::get('/th', function () {
		return view('frontend.th');
	});
	Route::get('/corporate', function () {
		return view('frontend.corporate');
	});
	Route::get('/clan', function () {
		return view('frontend.clan');
	});
	Route::get('/AddCar', function () {
		return view('frontend.AddCar');
	});

	Route::get('/tnc', function () {
		return view('frontend.tnc');
	});

	Route::get('/PocketRequest', function () {
		return view('frontend.PocketRequest');
	});

	Route::get('/PocketRespond', function () {
		return view('frontend.PocketRespond');
	});

	Route::get('/PocketRespondUS', function () {
		return view('frontend.PocketRespondUS');
	});

	Route::get('/cancel', function () {
		return view('frontend.cancel');
	});

	Route::get('/covid', function () {
		return view('frontend.covid');
	});


	Route::get('/ranking/top-scorer', function () {
		return view('frontend.ranking.topscorer'); //.topscorer
	});
	Route::get('/ranking/goal-keeper', function () {
		return view('frontend.ranking.goalkeeper'); //.goalkeeper
	});
	Route::get('/ranking/goal-assist', function () {
		return view('frontend.ranking.goalassist'); //.goalassist
	});
	Route::get('/ranking/top-player', function () {
		return view('frontend.ranking.topplayer'); //.topplayer
	});
	Route::get('/ranking/{match_type}', 'BookingController@setMatchType');
});


Route::group(['prefix' => '/', 'namespace' => 'frontend', 'middleware' => 'guest'], function () {
	Route::any('/login', 'UserController@login');

	Route::any('/register', 'UserController@register');

	Route::any('/registerTeam', 'UserController@registerTeam');
	Route::any('/forget', 'UserController@forget');
	// Route::any('/run','UserController@run');

});

// Forgot Password link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getPassword');
Route::post('password/reset', 'Auth\PasswordController@postPassword');

// View Team Schedule
Route::get('/team/schedule', function () {
	return view('frontend.team-schedule');
});

Route::group(['prefix' => '/', 'namespace' => 'frontend', 'middleware' => 'user'], function () {
	Route::get('/get-bib-number', 'BookingController@getBibNumbers');
	Route::any('/confirm', 'BookingController@confirm');
	Route::any('/confirm1', 'BookingController2@confirm');
	Route::any('/booking/{id}/court/{courtid}', 'BookingController@booking');
	Route::any('/booking1/{id}/court/{courtid}', 'BookingController2@booking1');
	Route::any('/court/{id}', 'BookingController@court');
	Route::any('/confirm/booking/{position}', 'BookingController@confirmation');
	Route::any('/confirm1/booking/{position}', 'BookingController2@confirmation');
	Route::any('/cancel/booking/{id}', 'BookingController@cancellation');

	// Open Games booking for PPSB 9v9 test
	// Route::get('/get-bib-number', 'BookingController9v9@getBibNumbers');
	// Route::any('/makebooking/{date}', 'BookingController9v9@make');
	// Route::any('/ppsb/timeslot-test', 'BookingController9v9@timeslot'); //change timeslot here
	// Route::any('/book', 'BookingController9v9@book');
	// Route::any('/confirm9v9', 'BookingController9v9@confirm');
	// Route::any('/booking/{id}/court/{courtid}', 'BookingController9v9@booking');
	// Route::any('/court/{id}', 'BookingController9v9@court');
	// Route::any('/confirm/booking/{position}', 'BookingController9v9@confirmation');
	// Route::any('/cancel/booking/{id}', 'BookingController9v9@cancellation');
	// Route::get('/ranking/{match_type}', 'BookingController9v9@setMatchType');

	// Open Games booking for PPSB 9v9 timeslot1
	Route::get('/get-bib-number', 'BookingController9v9t1@getBibNumbers');
	Route::any('/makebooking/{date}', 'BookingController9v9t1@make');
	Route::any('/ppsb/timeslot1', 'BookingController9v9t1@timeslot'); //change timeslot here
	Route::any('/book', 'BookingController9v9t1@book');
	Route::any('/confirm9v9', 'BookingController9v9t1@confirm');
	Route::any('/booking/{id}/court/{courtid}', 'BookingController9v9t1@booking');
	Route::any('/court/{id}', 'BookingController9v9t1@court');
	Route::any('/confirm/booking/{position}', 'BookingController9v9t1@confirmation');
	Route::any('/cancel/booking/{id}', 'BookingController9v9t1@cancellation');
	Route::get('/ranking/{match_type}', 'BookingController9v9t1@setMatchType');

	// Open Games booking for PPSB 9v9 timeslot2
	Route::get('/get-bib-number', 'BookingController9v9t2@getBibNumbers');
	Route::any('/makebooking/{date}', 'BookingController9v9t2@make');
	Route::any('/ppsb/timeslot2', 'BookingController9v9t2@timeslot'); //change timeslot here
	Route::any('/book', 'BookingController9v9t2@book');
	Route::any('/confirm9v9', 'BookingController9v9t2@confirm');
	Route::any('/booking/{id}/court/{courtid}', 'BookingController9v9t2@booking');
	Route::any('/court/{id}', 'BookingController9v9t2@court');
	Route::any('/confirm/booking/{position}', 'BookingController9v9t2@confirmation');
	Route::any('/cancel/booking/{id}', 'BookingController9v9t2@cancellation');
	Route::get('/ranking/{match_type}', 'BookingController9v9t2@setMatchType');

	// Open Games booking for PPSB 9v9 timeslot3
	Route::get('/get-bib-number', 'BookingController9v9t3@getBibNumbers');
	Route::any('/makebooking/{date}', 'BookingController9v9t3@make');
	Route::any('/ppsb/timeslot3', 'BookingController9v9t3@timeslot'); //change timeslot here
	Route::any('/book', 'BookingController9v9t3@book');
	Route::any('/confirm9v9', 'BookingController9v9t3@confirm');
	Route::any('/booking/{id}/court/{courtid}', 'BookingController9v9t3@booking');
	Route::any('/court/{id}', 'BookingController9v9t3@court');
	Route::any('/confirm/booking/{position}', 'BookingController9v9t3@confirmation');
	Route::any('/cancel/booking/{id}', 'BookingController9v9t3@cancellation');
	Route::get('/ranking/{match_type}', 'BookingController9v9t3@setMatchType');





	Route::any('/profile/{action?}', 'UserController@profile');
	Route::any('/token/{action?}', 'UserController@wallet');
	//route for pocket
	Route::post('/purchasetoken', 'UserController@purchasetoken');

	Route::any('/points/{action?}', 'UserController@points');
	Route::post('/creditrequest', 'UserController@creditrequest');
	Route::any('/bookings', 'UserController@bookings');
	Route::any('/notifications', 'UserController@notifications');
	Route::any('/logout', 'UserController@logout');
	Route::any('/test', function () {
		return view('frontend.test-confirm');
	});
	Route::any('/resetpass', 'UserController@resetpassword');
});
