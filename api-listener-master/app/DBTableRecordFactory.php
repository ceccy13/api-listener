<?php

namespace App;

class DBTableRecordFactory
{
    public static function insert($table, $response)
    {
        $className = 'App\\'.ucfirst(strtolower($table));
        if(is_a($className, 'App\iDatabaseInterface', true)){
            return $className::set($response);
        }
        else{
            echo $className.' is not istance of App\iDatabaseInterface';
            return false;
        }
    }

}

