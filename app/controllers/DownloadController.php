<?php

class DownloadController extends BaseController {

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

	public function createDownload()
	{
			$download=new Download();
			$download->downloadIP='';
			$download->downloadAgent='';
			$download->downloadEmail='';
			$download->downloadCode='';

			if($download->save())
			{
				// return success
			}

			else
			{
				//return try downloading again
			}
	}

	public function verifyDownload()
	{
		$email=Input::get('email');
		$code=Input::get('code');

		$download=Download::where('downloadEmail','=',$email);
		if($download)
		{
			//return download yes

			//generate APP DATA
		}

		else
		{
			//no download found
		}
	}

}