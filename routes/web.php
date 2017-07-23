<?php

    Auth::routes();

	Route::resource('prequest' , 'PRequestController');
	Route::resource('srequest' , 'SRequestController');
	Route::resource('service' , 'ServiceController');
	Route::resource('product' , 'ProductController');
	Route::resource('user' , 'UserController');
	Route::resource('unit' , 'UnitController');
///////////////////////////////////////////////////////////////////////////////  
	Route::get('prequest/create' , 'PRequestController@create');
	Route::get('index' , 'HomeController@index');		
	Route::get('select2-autocomplete-ajax', 'Select2AutocompleteController@dataAjax');
	Route::get('select3-autocomplete-ajax', 'Select2AutocompleteController@dataAjax2');
	Route::get('select4-autocomplete-ajax', 'Select2AutocompleteController@dataAjax3');
	Route::get('select5-autocomplete-ajax', 'Select2AutocompleteController@dataAjax4');
	Route::get('ticket' , 'HomeController@ticket')->name('ticket');
    Route::get('ticket_resp/{id}' , 'TicketController@ticket_resp')->name('ticket_resp');
	Route::get('/' , 'HomeController@welcome');	
    Route::get('reject_service' , 'HomeController@reject_service')->name('reject_service');
    Route::get('reject_product' , 'HomeController@reject_product')->name('reject_product');
    Route::get('notcheck_service' , 'HomeController@notcheck_service')->name('notcheck_service');
    Route::get('notcheck_product' , 'HomeController@notcheck_product')->name('notcheck_product');
////////////////////////////////////////////////////////////////////////////////
	Route::post('save' , 'PRequestController@save_ajax');
	Route::post('add' , 'PRequestController@add');
	Route::post('search' , 'ProductController@search');
	Route::post('search2' , 'ServiceController@search');
	Route::post('search3' , 'UnitController@search');
	Route::post('preject','PRequestController@reject');
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
	Route::post('/empty' , 'ProductController@empty_pro');
	Route::post('user/search_user' , 'UserController@search_user');

    Route::get('/home', 'HomeController@index');

    Route::group(['prefix' => 'client'], function () {
    
    Route::resource('/index','HomeController@new_index');
    Route::get('/details' , 'HomeController@details');
    Route::resource('/product_req' , 'ClientproController');
    Route::resource('/service_req' , 'ClientservController');
///////////////////////////////////////////////////////////////////////////    <!-- For Tickets -->
    Route::get('ticket/create' , 'TicketController@create');
    Route::get('ticket_show' , 'TicketController@index')->name('ticket_show');
    Route::post('ticket_store' , 'TicketController@store')->name('ticket.store');
    Route::get('ticket_details' , 'TicketController@ticket_details');
    Route::post('ticket/store/{id}' , 'TicketController@ticket_answer')->name('ticket_answer');

    Route::get('notseen' , 'TicketController@notseen')->name('notseen');
    Route::get('answer' , 'TicketController@answer')->name('answer');
    Route::get('notanswer' , 'TicketController@notanswer')->name('notanswer');
///////////////////////////////////////////////////////////////////////////
    Route::get('/select2-autocomplete-ajax', 'Select2AutocompleteController@client_dataAjax');
    Route::get('/request' , 'HomeController@final_request');	
    Route::get('/request2' , 'HomeController@reject_request');
    Route::get('/request3' , 'HomeController@confirm_request');
    Route::get('/request4' , 'HomeController@process_request');
///////////////////////////////////////////////////////////////////////////<!--For Product Request Statistics-->
    Route::get('process_pro' , 'RequestController@process_pro');
    Route::get('confirm_pro' , 'RequestController@confirm_pro');
    Route::get('reject_pro' , 'RequestController@reject_pro');
    Route::get('final_pro' , 'RequestController@final_pro');
////////////////////////////////////////////////////////////////////////////<!--For Service Request Statistics-->
    Route::get('process_serv' , 'RequestController@process_serv');
    Route::get('confirm_serv' , 'RequestController@confirm_serv');
    Route::get('reject_serv' , 'RequestController@reject_serv');
    Route::get('final_service' , 'RequestController@final_service');
////////////////////////////////////////////////////////////////////////////<!--For Request Details-->
    Route::get('process1/{id}' , 'RequestController@process1');
    Route::get('process2/{id}' , 'RequestController@process2');
    Route::get('confirm1/{id}' , 'RequestController@confirm1');
    Route::get('confirm2/{id}' , 'RequestController@confirm2');
    Route::get('reject1/{id}' , 'RequestController@reject1');
    Route::get('reject2/{id}' , 'RequestController@reject2');
    Route::get('final1/{id}' , 'RequestController@final1');
    Route::get('final2/{id}' , 'RequestController@final2');
/////////////////////////////////////////////////////////////////////////////  <!-- For Cancel Requests -->
    Route::get('cancel_details' , 'CancelController@details')->name('cancel.details');
    Route::get('scancel_confirm' , 'CancelController@sconfirm')->name('scancel_confirm');
    Route::get('pcancel_confirm' , 'CancelController@pconfirm')->name('pcancel_confirm');
    Route::get('scancel_current' , 'CancelController@scurrent')->name('scancel_current');
    Route::get('pcancel_current' , 'CancelController@pcurrent')->name('pcancel_current');
    Route::get('scancel_reject' , 'CancelController@sreject')->name('scancel_reject');
    Route::get('pcancel_reject' , 'CancelController@preject')->name('pcancel_reject');

///////////////////////////////////////////////////////////////////// <!-- For Details of Cancel Requests -->    
    Route::get('cconfirm1/{id}' , 'CancelController@confirm1')->name('cconfirm1');
    Route::get('cconfirm2/{id}' , 'CancelController@confirm2')->name('cconfirm2');
    Route::get('ccurrent1/{id}' , 'CancelController@current1')->name('ccurrent1');
    Route::get('ccurrent2/{id}' , 'CancelController@current2')->name('ccurrent2');
    Route::get('creject1/{id}' , 'CancelController@reject1')->name('creject1');
    Route::get('creject2/{id}' , 'CancelController@reject2')->name('creject2'); 
//////////////////////////////////////////////////////////////////////
    Route::post('/add' , 'PRequestController@add_2');
    Route::get('prequest/create' , 'PRequestController@create');
});
