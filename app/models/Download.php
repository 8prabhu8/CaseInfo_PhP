<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Download extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamps = false;

	public static function add()
	{

	}

	public static function check()
	{
		
	}
	

}