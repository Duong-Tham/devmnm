@extends('layout.admin')

@section('title')
<title> EDIT PRODUCTS</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admins/product/list.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name'=> 'PRODUCT', 'key'=> 'EDIT'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('product.update', ['id'=>$products->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Tên Sản Phẩm</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" class="form-control" value="{{$products->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Giá</label>
                            <div class="col-sm-12">
                                <input type="text" name="price" class="form-control" value="{{$products->price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Hình ảnh đại diện</label>
                            <div class="col-sm-12">
                                <input type="file" name="img_path" class="form-control-file">
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                <img class="product_img_150_100" src="{{$products->img_path}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Chọn danh mục</label>
                            <select class="col-sm-12" name="category_id">
                                <option value="0">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Nội dung</label>
                            <textarea class="col-sm-12 " name="content" rows="3">{{$products->content}}</textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
