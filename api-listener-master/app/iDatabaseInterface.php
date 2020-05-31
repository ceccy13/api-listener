<?php

namespace App;


interface iDatabaseInterface
{
    public static function set($response);
    public static function get();
    public static function delete();
}
