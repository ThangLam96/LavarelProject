<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function category ()
    {
        return view ('website.module.product.category');
    }

    public function detail ($id)
    {
        return view ('website.module.product.detail');
    }
}
