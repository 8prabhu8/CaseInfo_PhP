<?php

class AppController extends BaseController {

	/*
	* @param $string type of application
	*/
	public function generateData()
	{
		$type=Input::get('application_type');

		//ALGORITHM to generate generate APP_KEY & APP_SECRET
	}

	public function verify()
	{
		$app_key=Input::get('app_key');
		$app_secret=Input::get('app_secret');

		$app=App::where('app_key','=',$app_key)->first();

		if($app)
		{
			if($app->appSecret==$app_secret)
			{
				//app key is verified
			}
			else
			{
				//wrong app secret
			}
		}
		else
		{
			//
		}
	}
}