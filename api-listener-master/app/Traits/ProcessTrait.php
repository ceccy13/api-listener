<?php

namespace App\Traits;

use App\Api;
use App\DBTableFactory;
use App\DBTableRecordFactory;
use App\Token;
use App\Converter;
use App\StringResponseParser;
use App\Order;
use App\Product;


trait ProcessTrait
{
    private static $instanceApi;
    private $response = null;
    private $refresh_rate = -1;

    public function stopProcess()
    {
        session()->forget('is_active_listener');
        $this->setRefreshRate(5); // Stop Requests By Default
    }

    public function destroyProcess()
    {
        Token::updateIsActiveStatus(0);
        session()->flush();
        $this->setRefreshRate(-1); // Stop Requests By Default
    }

    public function startNewProcess()
    {
        $this->newProcess();
        Order::delete();
        Product::delete();
    }

    public function newProcess()
    {
        if(Token::getTokenInUse()) Token::updateIsActiveStatus(0);
        $token = Api::getAccessToken();
        session()->put('token',$token);
        $this->doProcess($token);
        Token::set($token);
    }

    public function doProcess($token)
    {
        $this->response = Api::getResponse($token);
        $parser = new StringResponseParser($this->response);
        $table = $parser->getTableName();
        $parsed_response = $parser->getParsedResponse();
        DBTableRecordFactory::insert($table, $parsed_response);

        $this->setRefreshRate(5);
    }

    public function setRefreshRate($refresh_rate){
        $this->refresh_rate = $refresh_rate;
    }

    public function getRefreshRate()
    {
        return $this->refresh_rate;
    }

    public function getResponse()
    {
        return $this->response;
    }

}