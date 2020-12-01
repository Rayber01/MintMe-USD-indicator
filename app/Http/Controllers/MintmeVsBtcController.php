<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MintmeVsBtcController extends Controller
{
    public function index()
    {
    	if (Cache::has('mintmeBtcPrice')) {

    		$cache = Cache::get('mintmeBtcPrice');
    		return $cache;

    	} else {
    		
    		$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://www.mintme.com/dev/api/v1/markets/BTC/MINTME",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "X-API-ID: 81bd3d7e6a26d0debdc393cceec1dcaee1687073b865134c783ca46feeea8e7d",
			    "X-API-KEY: 597c44b1b9d4856290e9ed0244a761ada214dde473aef95266c215f979246294",
			    "Cookie: __cfduid=d38a18e4f7bc1d6275b4e98467c38d0fc1604065021"
			  ),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$arr = json_decode($response);
			$mintmeBtcPrice = $arr->last;
			
			$cache = Cache::put('mintmeBtcPrice', $mintmeBtcPrice, 900);
	        return $mintmeBtcPrice;
    	}
    }
}
