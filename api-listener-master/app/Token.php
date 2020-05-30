<?php

namespace App;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidatorToken;
use Illuminate\Support\Facades\DB;
use App\Converter;


class Token
{
    private static $token = null;
    private static $is_expired_token = 1;
    private static $expiration_time = 3600; //By Default

    private function __construct()
    {

    }

    public static function validate($request, $id = null)
    {
        $unique = Rule::unique('Tokens')->ignore($id);
        return Validator::make($request, [
            'token' => ['bail', 'required', 'min:779', 'max:779', $unique],
        ]);
    }

    public static function set($token)
    {
        $token = trim($token);
        DB::table('tokens')->insertOrIgnore([
            [
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s', time()),
            'expired_at' => date('Y-m-d H:i:s', time() + self::$expiration_time),
            'is_active_status' => 1
            ]
        ]);
    }

    public static function getTokenInUse()
    {
        $result = DB::table('tokens')->where('is_active_status', '1')->first();
        $result = Converter::convertObjToArr($result);
        return $result['token'];
    }

    public static function updateIsActiveStatus($is_active_status)
    {
        $is_active_status = (int) $is_active_status;
        DB::table('tokens')
            ->where('is_active_status', 1)
            ->update(['is_active_status' => $is_active_status]);
    }

    public static function getExpiredAt()
    {
        $result = DB::table('tokens')
                    ->select('expired_at')
                    ->where('token', self::getTokenInUse())
                    ->first();
            $result =  Converter::convertObjToArr($result);
            return $result['expired_at'];
    }

    public static function getRemainingTime()
    {
        $expired_at = self::getExpiredAt();
        $expired_at  = strtotime($expired_at);
        $left_experation_time = $expired_at - time();
        if($left_experation_time <= 0) $left_experation_time = 0;
        return $left_experation_time;
    }

    public static function getExpiredTimePercent()
    {
        $left_experation_time_percent = (self::getRemainingTime() / self::$expiration_time) * 100;
        $left_experation_time_percent = round($left_experation_time_percent, 0);
        $expired_time_percent = 100 - $left_experation_time_percent;
        return $expired_time_percent;
    }

    public static function getIsExpiredToken()
    {
        $left_experation_time = self::getRemainingTime();
        if ($left_experation_time > 0) self::$is_expired_token = 0;
        return self::$is_expired_token;
    }

    public static function getIsActiveStatus()
    {
        $result = DB::table('tokens')->where('is_active_status', '1')->first();
        $result = Converter::convertObjToArr($result);
        return $result['is_active_status'];
    }

}
