<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\BtcVsUsdController;
use App\Http\Controllers\MintmeVsBtcController;

class CalcMintmeVsUsdController extends Controller
{
    public function index($amount=0)
    {

    	if (!is_numeric($amount) or !isset($amount)) {

    		return Response('Invalid number, please, enter a valid number.', 400);

    	} else {
    		
    		$btc = new BtcVsUsdController();
	    	$arr =  json_decode($btc->index(), true);
	    	$arrBtc = $arr["bitcoin"];
	    	$btcPrice = $arrBtc["usd"];
	    	$mintmeVsBtcPrice = new MintmeVsBtcController();
	    	$value = ($btcPrice * $mintmeVsBtcPrice->index()) * $amount;
	    	
	    	return $value;

    	}

    }
}
