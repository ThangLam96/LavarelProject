<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrawlerController extends Controller
{
    public function crawler()
    {
        $data = [];

        $file_html = file_get_html('https://www.thegioididong.com/dtdd-samsung');

        $element_title = $file_html->find('.listproduct .item a h3');
        foreach($element_title as $key => $e) {
            $data[$key]['name'] = trim($e->plaintext);
            $data[$key]['intro'] = "tom tat san pham" . $data[$key]['name'];
            $data[$key]['content'] = "noi dung san pham" . $data[$key]['name'];
            $data[$key]['status'] = 1;
            $data[$key]['user_id'] = 1;
            $data[$key]['category_id'] = 3;
        }

        $element_img = $file_html->find('.listproduct .item a .item-img_42 img');
        foreach($element_img as $key => $e) {
            if(count($element_title) > $key) {
                if($e->getAttribute('data-src') == false) {
                    $img_product = $e->src;
                } else {
                    $img_product = $e->getAttribute('data-src');
                }
                $file_name = basename($img_product);
                $file_path_in_src = public_path("tgdd/$file_name");

                if (!file_put_contents($file_path_in_src, file_get_contents($img_product))) {
                    echo "file downloading failed.:" . $data[$key]['name'];
                }

                $data[$key]['image'] = $file_name;
            } 
        }

        $element_price = $file_html->find('.listproduct .item a strong');
        foreach($element_price as $key => $e) {

            $price = str_replace('.', "", $e->plaintext);
            $price = str_replace('&#x20AB;', "", $price);
            $data[$key]['price'] = $price;
        }

        DB::table('products')->insert($data);
    }
}

