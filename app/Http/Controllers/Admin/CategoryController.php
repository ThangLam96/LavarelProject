<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;

class CategoryController extends BaseController
{
    public function __construct () 
    {
        parent::__construct('categories');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = $this->db->get();
       return $this->viewpage('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->viewpage('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();

        $this->db->insert($data);

        return $this->redirect_page('index', [] , ['success' => 'Thêm thể loại thành công.!']);
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
        $category = $this->db->where('id', $id);

        if ($category->exists()) {
            $data['category'] = $category->first();
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
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();

        $this->db->where('id', $id)->update($data);

        return $this->redirect_page('index', [] , ['success' => 'Sửa thể loại thành công.!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->db->where('id', $id);

        if ($category->exists()) {
            $category->delete();
        return $this->redirect_page('index', [] , ['success' => 'Xóa thể loại thành công.!']);
    } else {
        abort(404);
    }
    }
}
