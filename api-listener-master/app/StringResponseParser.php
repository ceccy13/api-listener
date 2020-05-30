<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Converter;

class StringResponseParser
{
    private $table;
    private $response = array();

    public function __construct($response)
    {
        if($response == 'error') return false;
        $response = stripcslashes($response);
        $response = preg_replace('/["}]/', '', $response);
        $response = preg_replace('/{/', '@', $response);
        $response = explode(':', $response);
        $this->table = $response[0];

        $response = explode('||', $response[1]);
        foreach($response as $key => $value){
            unset($response[$key]);
            $value = explode( '@', $value );
            if(preg_match("/image/i", $value[0])){
                $value[0] = preg_replace('/(\w+)\\\(\w+);(\w+)/i', '$1\\\$3;$2,', $value[0]);
                $this->response['image'] = $value[0].$value[1];
                continue;
            }
            $this->response[$value[0]] = $value[1];
        }
    }

    public function getParsedResponse()
    {
        return $this->response;
    }

    public function getTableName(){
        return $this->table;
    }

}
