<?php

class Input
{
    public static function notEmpty($key)
    {
        if(isset($_REQUEST[$key]) && ($_REQUEST[$key]!= '')){
            return true;
        }
    }
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        return (isset($_REQUEST[$key]));
    }
    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        return self::has($key)? $_REQUEST[$key] : $default;
    }
    public static function getString($key, $min = 0, $max = 1000)
    {
        if(!self::notEmpty($key)){
            throw new OutOfRangeException("Please enter $key.");
        } 
        if(!is_numeric($max)|| !is_numeric($min)){
            throw new InvalidArgumentException("$max and $min must be numeric.");
        }
        if (!is_string(self::get($key)) || is_numeric(self::get($key))){
            throw new DomainException ("$key must be a string.");
        }
        if(strlen(self::get($key)) > $max){
            throw new LengthException("$key is too long. Max length is $max.");
        }
        if(strlen(self::get($key))<$min){
            throw new LengthException("$key is too short. Min length is $min.");
        }
        return self::get($key);
    }
    public static function getNumber($key, $min = 0, $max = 2147483647)
    {
        if(!self::notEmpty($key)){
            throw new OutOfRangeException("Please enter $key.");
        }
        if(!is_numeric($max)|| !is_numeric($min)){
            throw new InvalidArgumentException("$max and $min must be numeric.");
        }
        if (!is_numeric(self::get($key))){
            throw new DomainException ("$key must be a number!");
        }
        if (self::get($key)<$min){
            throw new RangeException("$key must be greater than $min.");
        }
        if (self::get($key)>$max){
            throw new RangeException("key must be less than $max.");
        }
        return self::get($key);
    }
    public static function getDate($key)
    {
        $date = self::get($key);
        $d = new DateTime($date);
        return $d;
    }
    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}