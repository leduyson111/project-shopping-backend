
@extends('layouts.admin')

@section('title', 'Sửa user')

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admins/user/add/add.css') }}">

@endsection

@section('content')
    <div class="content-wrapper">
    @include('partials.content-header', ['name'=>'User',  'key'=> ' edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <form action="{{ url("/admin/users/update/$user->id") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Tên người dùng</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Nhập tên tên">

                            </div>

                            <div class="form-group">
                                <label >Email</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Nhập tên email">

                            </div>

                            <div class="form-group">
                                <label >Password</label>
                                <input type="text" name="password"  class="form-control" placeholder="Nhập tên password">

                            </div>

                            
                            <div class="form-group">
                                <label >Chọn vai trò</label>
                               
                                <select  class="form-control select2_init" name="role_id[]" multiple="multiple">
                                    <option  value=""></option>
                                    @foreach ($roles as $role )
                                    <option 
                                    {{ $roleUser->contains('id',$role->id) ? 'selected' : ""}}
                                    value="{{ $role->id }}">{{ $role->name }}
                                    </option>
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


