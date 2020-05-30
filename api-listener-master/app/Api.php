<?php

namespace App;

use App\Converter;

class Api
{
    private static $url_get_random_test_feed = 'https://apptest.wearepentagon.com/devInterview/API/en/get-random-test-feed';
    private static $url_access_token = 'https://apptest.wearepentagon.com/devInterview/API/en/access-token';
    private static $clientId = 'vladislav.stratonikov@wearepentagon.com';
    private static $clientSecret = 'password';

    private function __construct()
    {

    }

    public static function getResponse($token)
    {
        return self::httpRequest('GET', $token);
    }

    public static function getAccessToken()
    {
        $response = json_decode(self::httpRequest('POST'));
        $response = Converter::convertObjToArr($response);
        return $response['access_token'];
    }

    private static function httpRequest($method, $token = null)
    {
        $httpheader = array();
        $postfields = array();
        if($method == 'GET'){
            $url = self::$url_get_random_test_feed;
            $httpheader = array(
                              "Content-Type: application/x-www-form-urlencoded",
                              "Authorization: Bearer $token"
                          );
        }
        elseif($method == 'POST'){
            $url = self::$url_access_token;
            $postfields = array(
                              'client_id' => self::$clientId,
                              'client_secret' => self::$clientSecret
                          );
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $httpheader,
            CURLOPT_POSTFIELDS => $postfields
        ));

        $response = curl_exec($curl);
        if (!curl_errno($curl)){
            $info = curl_getinfo($curl);
        }

        if (!curl_errno($curl)){
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)){
                case 200:  return $response;
                    break;
                default:
                    return $response = 'error';
            }
        }
        curl_close($curl);
    }

}

