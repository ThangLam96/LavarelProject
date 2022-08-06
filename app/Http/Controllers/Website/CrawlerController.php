<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrawlerController extends Controller
{
    public function index($category,$link)
    {
        $data = [];

        $file_html = file_get_html($link);

        $element_title = $file_html->find('.listproduct .item a h3');
        foreach($element_title as $key => $e) {
            $data[$key]['name'] = trim($e->plaintext);
            $data[$key]['intro'] = "tom tat san pham" . $data[$key]['name'];
            $data[$key]['content'] = "noi dung san pham" . $data[$key]['name'];
            $data[$key]['status'] = 1;
            $data[$key]['user_id'] = 1;
            $data[$key]['category_id'] = $category;
            
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
                $file_path_in_src = public_path("images/$file_name");

                if (!empty($this->curl_image($img_product))) {
                        if (!file_put_contents($file_path_in_src, $this->curl_image($img_product))) {
                            echo "file downloading failed.:" . $data[$key]['name'];
                        }       
            }

                $data[$key]['image'] = $file_name;
            } 
        }

        $element_price = $file_html->find('.listproduct .item a');
        foreach($element_price as $key => $e) {
            if(count($element_title) > $key) {
                $price = (int)$e->getAttribute('data-price');
                $data[$key]['price'] = $price;
            }
        }

        DB::table('products')->insert($data);
    }

    public function featchALLTGDD ()
    {
        $result = DB::table('categories')->where('parent_id', 0)->get();

        foreach ($result as $item) {
            $link = $item->link;
            $category_id = $item->id;

            $this->index($category_id,$link);
        }
    }

    public function curl_image ($link)
    {
        $curi_handle = curl_init();
        curl_setopt($curi_handle, CURLOPT_URL,$link);
        curl_setopt($curi_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curi_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curi_handle, CURLOPT_USERAGENT,'Your application name');
        $query = curl_exec($curi_handle);
        curl_close($curi_handle);
        return $query; 
    }
}

