@extends('admin.master')
@section('module','User')
@section('action','Create')
@section('content')
<form action=" {{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">User Create</h3>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Please Enter Email" value={{ old('email') }}>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Please Enter Password">
                </div>

                <div class="form-group">
                    <label>Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Please Enter Password Confirmation">
                </div>

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Please Enter Full Name" value={{ old('fullname') }}>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Please Enter Phone" value={{ old('phone') }}>
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="2"  value={{ old('level') == 2 ? 'selected' : '' }}>Member</option>
                        <option value="1" value={{ old('level') == 1 ? 'selected' : '' }}>Adminstrator</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
    </div>
</form>
@endsection