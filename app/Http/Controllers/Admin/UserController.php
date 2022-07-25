<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;

class UserController extends BaseController
{
    public function __construct () 
    {
        parent::__construct('users');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = $this->db->get();
        
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
    public function store(UserRequest $request)
    {
        $data = $request->except('_token', 'password_confirmation');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new \DateTime();

        $imageName = time(). '-' . $request->avatar->getClientOriginalName();

        $request->avatar->move(public_path('assets/theme/img/users'), $imageName);
        $data['avatar'] = $imageName;

        $this->db->insert($data);

        return $this->redirect_page('index', [] , ['success' => 'Thêm thành viên thành công.!']);
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
        $user = $this->db->where('id', $id);

        if ($user->exists()) {
            $data['users'] = $user->first();
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
    public function update(UserRequest $request, $id)
    {
        $user_cur = $this->db->where('id', $id)->first();

        $data = $request->except('_token','password_confirmation');
        $data['updated_at'] = new \DateTime();

        if(empty($request->password)) {
            $data['password'] = $user_cur->password;
        } else {
            $validated = $request->validate([
                'password' => 'min:6'
            ],[
                'password.min' => 'Mật Khẩu ít nhất 6 kí tự',
            ]);
            $data['password'] = bcrypt($request->password);
        }

        if (empty($request->avatar)) {
            $data['avatar'] = $user_cur->avatar;
        } else {
            $image_path = public_path('assets/theme/img/users/').$user_cur->avatar;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $imageName = time(). '-' . $request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('assets/theme/img/users'), $imageName);
            $data['avatar'] = $imageName;
            }

        $this->db->where('id', $id)->update($data);

        return $this->redirect_page('index', [] , ['success' => 'Sửa thành viên thành công.!']);
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

            if (!empty($user_cur->avatar)) {
                $image_path = public_path('assets/theme/img/users/').$user_cur->avatar;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $user->delete();
        return $this->redirect_page('index', [] , ['success' => 'Xóa thành viên thành công.!']);
    } else {
        abort(404);
    }
    }
}

