@extends('admin.master')
@section('module','Product')
@section('action','Edit')
@section('content')
<form action=" {{ route('admin.products.update',['id' => $products->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Product Edit</h3>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Please choose category</option>
                        @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}"  value={{ old('category_id',$products->category_id) == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Please Enter Name" value={{ old('name', $products->name) }}>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Please Enter Price" value={{ old('price', $products->price) }}>
                </div>

                <div class="form-group">
                    <label>Intro</label>
                    <textarea name="intro" class="form-control" placeholder="Please Enter Intro">{{ old('intro', $products->intro) }}</textarea>
                    <script>CKEDITOR.replace('intro')</script>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" placeholder="Please Enter Content">{{ old('content', $products->content) }}</textarea>
                    <script>CKEDITOR.replace('content')</script>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1"  value={{ old('status', $products->status) == 1 ? 'selected' : '' }}>Show</option>
                        <option value="2" value={{ old('status', $products->status) == 2 ? 'selected' : '' }}>Hide</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Image Current</label>    
                    
                    @php

                        $image = !empty($products->image) ? $products->image : 'user2-160x160.jpg';
              
                    @endphp

                    <div class="form-group">
                        <img src="{{ asset('assets/theme/img/products/'.$image) }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
    </div>
</form>
@endsection