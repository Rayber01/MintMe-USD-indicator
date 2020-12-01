<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EthVsUsdController extends Controller
{
    public function index()
    {
    	if (Cache::has('ethPrice')) {
    		
    		$cache = Cache::get('ethPrice');
    		return $cache;

    	} else {
    		
    		$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=usd",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "Cookie: __cfduid=d36b80035b26e4077a0a7fbf6f5a78a4f1604657635"
			  ),
			));

			$ethPrice = curl_exec($curl);
			curl_close($curl);
			$cache = Cache::put('ethPrice', $ethPrice, 900);
			return $ethPrice;

    	}
    }
}
