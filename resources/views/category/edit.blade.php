@extends('layout.admin')

@section('title')
<title> Xin chào ADMIN</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=> 'CATEGORY', 'key'=> 'EDIT'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="GET">
                    @csrf
                    <div class="form-group row">
                        <label  class="col-sm-7 col-form-label">Tên Danh Mục</label>
                        <div class="col-sm-10">
                            <input type="text" name="namedm" class="form-control" value="{{$category->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
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