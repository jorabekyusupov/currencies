<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::paginate();
        return response()->json($currencies);
    }



    public function show($id)
    {
        $currency = Currency::findOrFail($id);
        return response()->json($currency);
    }


}
