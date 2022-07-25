<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

class ProductController extends BaseController
{
    public function __construct () 
    {
        parent::__construct('products');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = DB::table('products')
        ->select('products.*', 'categories.name as category_name', 'users.fullname as user_fullname')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->get();        
       return $this->viewpage('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = DB::table('categories')->get();
        return $this->viewpage('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();

        $imageName = time(). '-' . $request->image->getClientOriginalName();
        $request->image->move(public_path('assets/theme/img/products'), $imageName);
        $data['image'] = $imageName;

        $data['user_id'] = 1;

        $this->db->insert($data);

        return $this->redirect_page('index', [] , ['success' => 'Thêm sản phẩm thành công.!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->db->where('id', $id);

        
        if ($product->exists()) {
            $data['products'] = $product->first();
            $data['categories'] = DB::table('categories')->get();
            return $this->viewpage('edit', $data);
        } else {
            abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product_cur = $this->db->where('id', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();

       
        if (empty($request->image)) {
            $data['image'] = $user_cur->image;
        } else {
            $image_path = public_path('assets/theme/img/products/').$product_cur->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $imageName = time(). '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('assets/theme/img/products'), $imageName);
            $data['image'] = $imageName;
            }

            $data['user_id'] = 1;

        $this->db->where('id', $id)->update($data);

        return $this->redirect_page('index', [] , ['success' => 'Sửa sản phẩm thành công.!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->db->where('id', $id);

        if ($user->exists()) {
            $user_cur = $user->first();

            if (!empty($user_cur->image)) {
                $image_path = public_path('assets/theme/img/products/').$user_cur->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $user->delete();
        return $this->redirect_page('index', [] , ['success' => 'Xóa sản phẩm thành công.!']);
    } else {
        abort(404);
    }
    }
}
