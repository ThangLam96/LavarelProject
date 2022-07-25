@extends('admin.master')
@section('module','Product')
@section('action','Create')
@section('content')
<form action=" {{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Product Create</h3>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Please choose category</option>
                        @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}"  value={{ old('category_id') == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Please Enter Name" value={{ old('name') }}>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Please Enter Price">
                </div>

                <div class="form-group">
                    <label>Intro</label>
                    <textarea name="intro" class="form-control" placeholder="Please Enter Intro">{{ old('intro') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" placeholder="Please Enter Content">{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1"  value={{ old('status') == 1 ? 'selected' : '' }}>Show</option>
                        <option value="2" value={{ old('status') == 2 ? 'selected' : '' }}>Hide</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
    </div>
</form>
@endsection