<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function category ($id)
    {
        $data['category_list'] = $this->category_product($id);
        $data['category_name'] = DB::table('categories')->where('id', $id)->first()->name;

        $data['products_random'] = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as catename')
        ->whereIn('category_id', $category_id_featured)
        ->inRandomOrder()
        ->limit(12)
        ->get();

        

        return view ('website.module.product.category', $data);

    }

    public function detail ($id)
    {
        return view ('website.module.product.detail');
    }

    public function category_product ($category_id, $skip = null, $limit = null)
    {
        $sql = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as catename')
        ->where('category_id', $category_id);
        if (!is_null($skip) && !is_null($limit)) {
            $sql->skip($skip)->limit($limit);
        }

       return $sql->get();    
    }
}
