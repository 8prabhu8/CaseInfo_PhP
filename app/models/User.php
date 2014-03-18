<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamps = false;

	protected $fillable = array('user','password');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function verifyAppSecret($appKey,$appSecret)
	{

	}

	public static function verifyLogin($credential)
	{
                                    //@echo 'in verify login';exit;

		$credential=(object) $credential;
		$userFromController = $credential->user;
		$passwordFromController = $credential->password;


        //echo $userFromController;exit;
                                            //$password = Hash::make('secret');

                                        //@echo $userFromController.' This is the user from java';exit;
										//  echo $user.$password;

		                                //$asdf = User::where('user','=',$user);

		$SearchData = DB::table('users')->where('user', $userFromController)->first();

        //-----------------------------------------------------------------------------------------------------

//        if($SearchData->user){
//
//            if(Hash::check($passwordFromController,$SearchData->password)){
//
//            }
//        }



        //-----------------------------------------------------------------------------------------------------



                                        //print_r($SearchData); exit;

		echo $userFromDB =  $SearchData->user;
        echo "-> User from DB \n";
		echo $passwordFromDB =  $SearchData->password;
        echo "-> Password is from DB \n ";
		echo $userActive =  $SearchData->userIsActive;
        echo "\n";
        echo $passwordFromController;
        echo "-> Password is from Controller \n ";

                                                //echo $passwordFromController.$passwordFromDB;exit;

                                                //@echo $passwordFromController.'  '.$passwordFromDB;exit;

        if (Hash::check($passwordFromController, $passwordFromDB))
        {

            if($userActive == 'N'){
                echo 'login successful but This User has to be Activated';
            }else{
                echo 'Login Successfull';
            }
        }else{
            echo 'Failed login';
        }

//		if($passwordFromController == $passwordFromDB){
//
//            echo 'Login Successfull';
//        }else{
//            echo 'Failed login';
//        }
		//echo $user['password'];

		//print_r ($user);

		//print_r ($asdf);



	}

    public function register($NewData){
$a = new User();
        $a->create(array(
            'user'=>$NewData['user'],
            'password'=>Hash::make($NewData['password'])));

    }


	public function failedAttempt($data)
	{

		$res=DB::table('failed_logins')
				->insert(array(
					 	        'usersId'			=> 	$data['user_id'],
					 	        'ipAddress'		    =>  $data['ip'],
					 	        'attempted'		    => $data['count']
					 	        )
				         );
	}


}