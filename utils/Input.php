<?php

class Input 
{
	public static function has($key)
	{
		return isset($_REQUEST[$key]);
	}

	public static function get($key, $default=NULL) 
	{
		if(self::has($key)){

			return $_REQUEST[$key];

		}

		return $default;
	}

	public static function escape($value)
    {
        
        $outString = htmlspecialchars(strip_tags($value));
        return $outString;
    }


}