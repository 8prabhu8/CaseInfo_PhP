<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	// public function login(){

	// 	return 'inside login';
	// 	echo 'inside login';
	// }

	public function login()
	{

		// $data=array(
		// 			'user'	=> Input::get('user'),
		// 			'password'	=> Input::get('password')
		// 			);

//        'user'	=> $_GET['user'],
//					'password'	=> $_GET['password']


        //return 'controllerlogin';exit;

        $input = Input::all();
        $user = $input['user'];
        $password = $input['password'];

       //@ echo $user; echo $password;

				$data=array(
					'user'	=> $user,
					'password'	=> $password
					);

       print_r($data) ;//return $data['user'];exit;

         User::verifyLogin($data);

//        if(!empty($_GET['user'])) {
//            echo $_GET['user'];
//        }


		//$auth = null;

//		if(User::verifyLogin($data))
//		{
//			 return 'success';
//		}
//
//		else
//		{
//			return 'failed';
//
//			//$failedStatus=User::failedLogin(array('user_id'=>'','ipAddress'=>'','attempted'=>''));
//		}

	}

    public function fetch(){

       // $ToFetch = Input::All();
        //print_r($ToFetch);
//        echo 'I am in fetch in controller...........';
//        $res = DB::table('users')->get();
        $res = DB::table('users')->get();
        //print_r($res);
//        print_r($res);
       // echo 'I am returning an array $res';
        return $res;

        //return $res;



    }

	 public function register()
	 {

         $RegisterInput = Input::All();
//         $RegUsername = $RegisterInput['NewUser'];
//         $RegPassword = $RegisterInput['NewPassword'];
//         $RegArrayData = array('user' => $RegUsername,'password' => $RegPassword);

//         print_r($RegisterInput);

	 	$user=new User();

        // print_r($user);exit;

	 	 $NewDisplayName = $user->DisplayName=$RegisterInput['NewDisplayName'];
	 	 $NewUser =  $user->user=$RegisterInput['NewUser'];
	 	 $NewPassword = $user->password = Hash::make($RegisterInput['NewPassword']);
                    $user->userIsActive='N';
                    $user->userIsBanned='N';
                    $user->userIsSuspended='N';

         $NewData = array('DisplayName'=>$NewDisplayName,'user'=>$NewUser,'password'=>$NewPassword);



         print_r($NewData);                       //ok

//         User::create(array(
//             'user'=>$NewData['user'],
//             'password'=>Hash::make($NewData['password'])));

         //User::register($NewData);

	 	if($user->save())
	 	{
	 		//return success message
	 	}

	 	else
	 	{
	 		//return fail message
	 	}
	 }

	

}