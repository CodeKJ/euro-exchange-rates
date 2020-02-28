<?php

namespace App\Http\Controllers;

use App\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{

    /**
     * Index page view
     */
    public function index(){
        $currencies = Currency::where('created_at', Carbon::now()->format('Y-m-d'))->paginate(16);

        // if currencies are not found for today, we get yesterday values. RSS feed provides data from at least 1 day ago
        if(!$currencies->count())
            $currencies = Currency::where('created_at', Carbon::now()->subDay()->format('Y-m-d'))->paginate(16);

        return view('index', ['currencies' => $currencies, 'currency_date' => $currencies->first()->created_at->format('d.m.Y')]);
    }

    /**
     * Individual currency page view
     */
    public function currency($currency){
        $exchange_rates = Currency::where('currency', $currency)->orderBy('created_at', 'desc')->paginate(16);

        if(!$exchange_rates->count())
            abort(404);

        return view('currency', ['currency' => $currency, 'exchange_rates' => $exchange_rates]);
    }

}
