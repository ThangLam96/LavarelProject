<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index ()
    {
        $sql_category = DB::table('categories')->where('parent_id', 2)->limit(4);

        $data['category_featured'] = $sql_category->get();

        $category_id_featured = $sql_category->pluck('id')->toArray();

        $data['products_random'] = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as catename')
        ->whereIn('category_id', $category_id_featured)
        ->inRandomOrder()
        ->limit(12)
        ->get();

        $data_category_lasted = DB::table('categories')
                ->where('parent_id', 2)
                ->whereNotIn('id', $category_id_featured)
                ->limit(3)
                ->get();

        $category_lasted = [];

        foreach( $data_category_lasted as $category_item) {

             $category_lasted[$category_item->name][] = $this->category_product($category_item->id, 0, 3);
             $category_lasted[$category_item->name][] = $this->category_product($category_item->id, 3, 3);
            
        }

        $data['category_lasted'] = $category_lasted;

        return view ('website.module.homepage.index', $data);

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
