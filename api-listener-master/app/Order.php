<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Order implements iDatabaseInterface
{
    public static function set($response)
    {
        DB::table('order')->insertOrIgnore($response);
    }

    public static function get()
    {
        $result = DB::table('order')
            ->orderBy('create_time', 'desc')
            ->get();

        return Converter::convertObjToArr($result);
    }

    public static function delete()
    {
        DB::table('order')->delete();
        return true;
    }
}
