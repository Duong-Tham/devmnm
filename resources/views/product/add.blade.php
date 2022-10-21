@extends('layout.admin')

@section('title')
<title> ADD PRODUCTS</title>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name'=> 'PRODUCT', 'key'=> 'ADD'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Tên Sản Phẩm</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" value="{{old('name')}}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Giá</label>
                            <div class="col-sm-12">
                                <input type="text" name="price" value="{{old('price')}}"
                                class="form-control @error('price') is-invalid @enderror" placeholder="Nhập giá sản phẩm">
                            </div>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Hình ảnh đại diện</label>
                            <div class="col-sm-12">
                                <input type="file" name="img_path" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Chọn danh mục</label>
                            <select class="col-sm-12 @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label>Nội dung</label>
                            <textarea class="col-sm-12 @error('content') is-invalid @enderror" name="content" rows="3">
                            {{old('content')}}
                            </textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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