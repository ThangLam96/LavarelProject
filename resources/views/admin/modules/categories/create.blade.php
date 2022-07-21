@extends('admin.master')
@section('module','Category')
@section('action','Create')
@section('content')
<form action=" {{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Category Create</h3>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Please Enter Category Name">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
    </div>
</form>
@endsection