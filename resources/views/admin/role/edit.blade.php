
@extends('layouts.admin')

@section('title', 'Sửa roles')


@section('css')
<link rel="stylesheet" href="{{ asset('admins/role/add/add.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'roles',  'key'=> ' edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <form action="{{ url("/admin/roles/update/$role->id") }}" method="POST" style="width:100%" enctype="multipart/form-data">

                    <div class="col-md-12">
                        <form action="{{ url('/admin/roles/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Tên slider</label>
                                <input type="text" name="name" value="{{$role->name}}" class="form-control"   placeholder="Nhập tên vai trò">
                            </div>

                            <div  class="form-group">
                                <label >Mô tả</label>
                                <textarea  type="text" rows="4" name="display_name" class="form-control " >  {{$role->display_name}}</textarea>
                            </div>

                          

                            <div class="col-md-12">

                                <div class="col-md-12">
                                    <label> 
                                        Checkall
                                        <input type="checkbox"  class="checkall">
                                    </label>
            
                                </div>

                                <div class="row">
                                    @foreach ($permissionsParent  as  $permissionsParentItem )
                                        
                                        <div class="card bg-light mb-3 col-md-12" >
                                            <div class="card-header">
                                                <label >
                                                    <input type="checkbox" name="" class="checkbox_wapper" value="">
                                                </label>
                                                Module  {{ $permissionsParentItem->name }}
                                            </div>
                                            <div class="row">
                                                @foreach ( $permissionsParentItem->permissionsChildrent as $permissionsParentItemChildrent )
                                           
                                                    <div class="card-body col-md-3">
                                                        <h5 class="card-title">
                                                            <label >
                                                                <input type="checkbox" class="checkbox_childrent" name="permission_id[]"
                                                                {{ $permissionChecked->contains('id' , $permissionsParentItemChildrent ->id) ? 'checked' : "" }}
                                                                
                                                                value="{{ $permissionsParentItemChildrent ->id }}">
                                                            </label>
                                                            {{ $permissionsParentItemChildrent->name }}
                                                        </h5>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
<script src="{{ asset('admins/role/add/add.js') }}"></script>

@endsection

