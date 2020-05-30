<?php

namespace App;

class DBTableFactory
{
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

        return $className->set($response);
    }

}

