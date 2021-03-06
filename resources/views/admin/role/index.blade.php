
@extends('layouts.admin')
@section('title', 'Roles')


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'role',  'key'=> ' list'])


        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                         <a href="{{ url('/admin/roles/create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Mô tả vai trò</th>
                               
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as  $role )
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->descripiton }}</td>
                                    <td>
                                        <a href="{{ url("/admin/roles/edit/$role->id") }}" class="btn btn-default">Edit</a>
                                        <a  href="" data-url="{{ url("/admin/roles/delete/$role->id") }}" class="btn btn-danger action_delete">Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                {{ $roles->links() }}
            </div>


        </div>


    </div>
@endsection

