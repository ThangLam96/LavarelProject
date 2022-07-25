@extends('admin.master')
@section('module','User')
@section('action','Edit')
@section('content')
<form action=" {{ route('admin.users.update', ['id' => $users->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">User Edit</h3>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Please Enter Email" value={{ old('email', $users->email) }}>
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
                    <input type="text" name="fullname" class="form-control" placeholder="Please Enter Full Name" value={{ old('fullname', $users->fullname) }}>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Please Enter Phone" value={{ old('phone', $users->phone) }}>
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="2"  value={{ old('level', $users->level) == 2 ? 'selected' : '' }}>Member</option>
                        <option value="1" value={{ old('level', $users->level) == 1 ? 'selected' : '' }}>Adminstrator</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Avatar Current</label>    
                    
                    @php

                        $avatar = !empty($users->avatar) ? $users->avatar : 'user2-160x160.jpg';
              
                    @endphp

                    <div class="form-group">
                        <img src="{{ asset('assets/theme/img/users/'.$avatar) }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label>Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
    </div>
</form>
@endsection