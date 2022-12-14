@extends('layout.admin')

@section('title')
<title>Trang Thông Tin Nhân Viên</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'USER', 'key' => 'LIST'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="" class="btn btn-success float-right m-2"> Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)

                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                    <a href="" class="btn btn-default">Edit</a>
                                    <a href="" data-url="" class="btn btn-danger action_delete">Delete</a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>

</div>

@endsection