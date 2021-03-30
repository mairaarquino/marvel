<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    var $url = 'https://gateway.marvel.com:443/v1/public/';
    public function index($offset=0) {
        $url = $this->url .'characters?offset='. $offset.'&';
        $result = json_decode($this->makeRequest($url));
        if(!isset($result->data)) {
            abort(404);
        }
        $total = $result->data->total;
        $result = $result->data->results;
        return view('index', ['result'=>$result, 'offset'=>$offset, 'total'=>$total]);
    }

    public function character($id) {
        $url = $this->url.'characters?id='.$id .'&';
        $result = json_decode($this->makeRequest($url));
        if(!isset($result->data)) {
            abort(404);
        }
        $result = $result->data->results;
        return view('character', ['result'=>$result]);
    }

    public function search() {
        $offset = 0;
        $name = $_GET['name'];
        $url = $this->url .'characters?nameStartsWith='. $name.'&';
        
        $result = json_decode($this->makeRequest($url));
        $total = $result->data->total;
        if(!isset($result->data)) {
            abort(404);
        }
        $result = $result->data->results;
        return view('index', ['result'=>$result, 'offset'=>$offset, 'total'=> $total]);
    }
    
    public function comics($id) {
        $url = $url = $this->url.'comics/'.$id .'?';
        $result = json_decode($this->makeRequest($url));
        if(!isset($result->data)) {
            abort(404);
        }
        $result = $result->data->results;
        return view('comic', ['result'=>$result]);
    }
    public function generateURL($url) {
        $public_key = '40556e7f1023b0125590955d4f0e0bb6';
        $private_key = '3f0d0707468c889771d19b90c826548609075d97';

        $ts= time();
        $hash = md5($ts.$private_key.$public_key);

        return $url . 'apikey='. $public_key. '&ts='.$ts.'&hash='.$hash;
    }

    public function makeRequest($url) {
        $curl = curl_init();

        $data_url = $this->generateURL($url);

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $data_url
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
