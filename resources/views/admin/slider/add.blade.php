
@extends('layouts.admin')

@section('title', 'Thêm slider')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Slider',  'key'=> ' add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <form action="{{ url('/admin/slider/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Tên slider</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"   placeholder="Nhập tên menu">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div    class="form-group">
                                <label >Mô tả</label>
                                <textarea type="text" rows="4" name="descripiton" class="form-control @error('descripiton') is-invalid @enderror" >  {{old('descripiton')}}</textarea>
                                @error('descripiton')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label >Hình ảnh slider</label>
                                <input type="file" name="image_path" class="form-control-flie @error('image_path') is-invalid @enderror"  >
                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection

