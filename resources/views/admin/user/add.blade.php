
@extends('layouts.admin')

@section('title', 'Thêm user')

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admins/user/add/add.css') }}">

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'User',  'key'=> ' add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <form action="{{ url('/admin/users/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Tên người dùng</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nhập tên tên">

                            </div>

                            <div class="form-group">
                                <label >Email</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Nhập tên email">

                            </div>

                            <div class="form-group">
                                <label >Password</label>
                                <input type="text" name="password" value="{{old('password')}}" class="form-control" placeholder="Nhập tên password">

                            </div>

                            
                            <div class="form-group">
                                <label >Chọn vai trò</label>
                               
                                <select  class="form-control select2_init" name="role_id[]" multiple="multiple">
                                    <option value=""></option>
                                    @foreach ($roles as $role )
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                 
                                </select>

                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection


@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admins/user/add/add.js') }}"></script>
@endsection


