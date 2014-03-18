<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/test1',function(){
$a=array('name'=>'ashes','roll'=>'wedew');
return json_encode($a);
});


//----------------------------------------------------------------------------


Route::get('/add',function(){

			User::create(array(
            'DisplayName'=>'Mother Teresa',
			'user'=>'mother',
			'password'=>Hash::make('teresa')));
});

//---------------------------------------------------------------------------

			Route::get('/', function()
			{
				echo 'Halin maathro  Laravel default page';
			});

//----------------------------------------------------------------------------

				Route::get('/check1',function(){
					return 'success';
				});

//----------------------------------------------------------------------------

Route::post('/check', function()
{
	 // return View::make('hello');
	//var_dump(new User);

		$input = Input::all();
		 $user = $input['user'];
		 $password = $input['password'];
		//print_r($input);
		//echo $input['user'];
		// echo $user = $input['user'];
   // echo 'and    ';
		 //echo $password = $input['password'];exit;


	   //var_dump(Auth::attempt(array('user'=>'sai','password'=>'divya')));
		// var_dump(Auth::attempt(array('user'=>$user,'password'=>$password)));



		if (Auth::attempt(array('user'=>$user,'password'=>$password))) {
			return "Login Successfull";

		}else{
			return $user.'-'.$password.'  Failed Login';
		}
});

//---------------------------------------------------------------------------------

/*
* Route for all API call.
*/


//Route::get('/login', function(){echo 'hi';});


Route::group(array('before' => 'verifyServiceRequest'), function()
{
	Route::post('/register',array('as'=>'userRegistration','uses'=>'userController@register'));

	Route::post('/login',array('as'=>'userLogin','uses'=>'userController@login'));

    Route::post('/fetch',array('as'=>'userFetch','uses'=>'userController@fetch'));
	
});

// function verifyServiceRequest()
// {
// 	//
// }


//-------------------------------------------------------------------------------------
