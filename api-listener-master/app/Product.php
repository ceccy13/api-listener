<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Product implements iDatabaseInterface
{
    public static function set($response)
    {
        DB::table('product')->insertOrIgnore($response);
    }

    public static function get()
    {
        $result = DB::table('product')
            ->orderBy('title', 'desc')
            ->get();

        return Converter::convertObjToArr($result);
    }

    public static function delete()
    {
        DB::table('product')->delete();
        return true;
    }
}
