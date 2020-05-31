<?php

namespace App;

class DBTableRecordFactory
{
    public static function insert($table, $response)
    {
        $className = 'App\\'.ucfirst(strtolower($table));
        if(($className instanceof iTradersInterface)){
            echo get_class($className).' is not istance of iTradersInterface';
            return false;
        }
        return $className::set($response);
    }

}

