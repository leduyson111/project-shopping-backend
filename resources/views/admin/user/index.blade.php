
@extends('layouts.admin')
@section('title', 'User')

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/slider/index.js') }}"></script>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'user',  'key'=> ' list'])

        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                         <a href="{{ url('/admin/users/create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên người dùng</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as  $user )
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email  }}</td>
                                    <td>
                                        <a href="{{ url("/admin/users/edit/$user->id") }}" class="btn btn-default">Edit</a>
                                        <a  href="" data-url="{{ url("/admin/users/delete/$user->id") }}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{ $users->links() }}

        </div>


    </div>
@endsection

