<?php

namespace App;


class DBTableFactory
{
    private static $obj;

    public static function insert($table, $response)
    {
        /* if($table == 'order'){
             self::$obj = new Order();
         }
         elseif($table == 'product'){
             self::$obj = new Product();
         }
         else{
             return false;
         }*/

        $className = 'App\\'.ucfirst(strtolower($table));
        self::$obj = new $className;

        return self::$obj->set($response);
    }

}

