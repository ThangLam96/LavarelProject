<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart ()
    {
        return view('website.module.cart.cart');
    }

    public function payment ()
    {
        return view('website.module.cart.payment');
    }
}
