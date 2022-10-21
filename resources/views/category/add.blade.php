@extends('layout.admin')

@section('title')
<title> Xin chào ADMIN</title>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name'=> 'CATEGORY', 'key'=> 'ADD'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                <form action="{{ route('categories.store')}} " method="POST">
                    @csrf
                    <div class="form-group row">
                        <label  class="col-sm-7 col-form-label">Tên Danh Mục</label>
                        <div class="col-sm-10">
                            <input type="text" name="namedm" value="{{old('namedm')}}"
                            class="form-control @error('namedm') is-invalid @enderror" placeholder="Nhập tên danh mục">
                        </div>
                        @error('namedm')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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