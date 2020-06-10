<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Route;
use App\Api;
use App\Database;
use App\Token;
use App\Converter;
use App\StringResponseParser;
use App\Order;
use App\Product;
use App\Traits\ProcessTrait;

class ApiController extends Controller
{
    use ProcessTrait;

    public function home(Request $request)
    {
        //session()->flush();
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            die("Could not connect to the database! <br><br> Check settings and if DB is imported successfully! ");
        }

        //Check Listener Is Started Or Stopped
        if($request->exists('is_active_listener')){
            //Requested Data
            $is_active_listener = $request->get('is_active_listener');
            $is_active_listener == 1 ? session()->put('is_active_listener', 1) : session()->put('is_active_listener', 0);
        }

        if(session()->get('is_active_listener')) {
            if(!session()->exists('token') && Token::getIsActiveStatus()){
                session()->put('token', Token::getTokenInUse());
                $this->doProcess(session()->get('token'));
            }
            elseif(!session()->exists('token') && !Token::getIsActiveStatus()){
                $this->startNewProcess();
            }
            elseif(session()->exists('token')){
                $this->doProcess(session()->get('token'));
                if ($this->getResponse() == 'error' && Token::getIsExpiredToken()) $this->newProcess();
            }
            $data['response'] = $this->getResponse();
        }
        else{
            //Token::getIsExpiredToken() ? $this->destroyProcess() : $this->stopProcess();
            //$data = array();

            if(Token::getIsActiveStatus() && !session()->exists('token')){
                $this->setRefreshRate(5);
                session()->put('guest_waiting', 1);
            }
            else{
                $this->destroyProcess();
            }

        }

        $data['token_expired_time_percent'] = Token::getExpiredTimePercent();
        $refresh_rate = $this->getRefreshRate(); //seconds
        $url = url()->current();

        return response()->view('home', compact('data'), 200)
                ->header("Refresh", "$refresh_rate;url=$url");
    }

    public function products(Request $request)
    {
        if(session()->exists('token') && session()->get('is_active_listener')) {
            $this->doProcess(session()->get('token'));
            if ($this->getResponse() == 'error' && Token::getIsExpiredToken()) $this->newProcess();
        }
        elseif(Token::getIsActiveStatus() && !session()->exists('token')){
            $this->setRefreshRate(5);
        }

        $data = Product::get();
        $data['refresh_rate'] = $this->getRefreshRate() * 1000; //miliseconds
        return view('products', array('data' => $data));
    }

    public function orders(Request $request)
    {
        if(session()->exists('token') && session()->get('is_active_listener')) {
            $this->doProcess(session()->get('token'));
            if ($this->getResponse() == 'error' && Token::getIsExpiredToken()) $this->newProcess();
        }
        elseif(Token::getIsActiveStatus() && !session()->exists('token')){
            $this->setRefreshRate(5);
        }

        $data = Order::get();
        $data['refresh_rate'] = $this->getRefreshRate() * 1000; //miliseconds
        return view('orders', array('data' => $data));
    }

}

