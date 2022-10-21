@extends('layout.admin')

@section('title')
<title> LIST PRODUCT</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/product/list.css')}}">
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admins/product/list.js')}}"></script>
@endsection

@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name'=> 'PRODUCT', 'key'=> 'LIST'])
 
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('product.add') }}" class="btn btn-success float-right m-2">ADD</a>
        </div>
        <div class="col-md-12">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Giá </th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Danh Mục</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
              <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{number_format($product->price) }}</td>
                <td>
                    <img class="product_img_150_100" src="{{$product->img_path}}" alt="">
                </td>
                <td>{{optional($product->category)->name}}</td>
                <td>
                  <a href="{{route('product.edit', ['id'=>$product->id]) }}" class="btn btn-primary">Edit</a>
                  <a href="" 
                  data-url="{{route('product.delete', ['id'=>$product->id]) }}"
                  class="btn btn-danger action_delete">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
        {{ $products->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 