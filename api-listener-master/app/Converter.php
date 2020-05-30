<?php

namespace App;

class Converter
{
    static private $arr = array();

    public function __construct()
    {

    }

    static public function convertObjToArr($obj)
    {
        return self::$arr = json_decode(json_encode($obj), true);
    }
}
