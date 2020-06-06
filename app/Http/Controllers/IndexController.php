<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    var $url = 'https://gateway.marvel.com:443/v1/public/characters?';
    public function index() {
        $result = json_decode($this->makeRequest($this->url))->data->results;
        return view('index', ['result'=>$result]);
    }

    public function character($id) {
        $url = 'https://gateway.marvel.com:443/v1/public/characters/'.$id.'?';

        $result = json_decode($this->makeRequest($url))->data->results;
        return view('character', ['result'=>$result]);
    }
    
    public function generateURL($url) {
        $public_key = '7d50c74f2e3c0d144a7c154b759ef920';
        $private_key = '484ddd43e8e5e70dd95d3239d73d37bc951a2bd7';

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
