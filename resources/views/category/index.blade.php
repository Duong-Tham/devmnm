@extends('layout.admin')

@section('title')
<title> CATEGORY LIST</title>
@endsection
@section('content')
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admins/category/category.js')}}"></script>
@endsection
<div class="content-wrapper">
  @include('partials.content-header', ['name'=> 'CATEGORY', 'key'=> 'LIST'])
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('categories.create')}} " class="btn btn-success float-right m-2">ADD</a>
        </div>
        <div class="col-md-8">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)

              <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>
                  <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-primary">Edit</a>
                  <a href=""
                  data-path="{{ route('categories.delete', ['id' => $category->id]) }}"
                  class="btn btn-danger click-delete">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection