
@extends('layouts.admin')

@section('title', 'Sửa slider')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Slider',  'key'=> ' edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <form action="{{ url("/admin/slider/update/$slider->id") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Tên slider</label>
                                <input type="text" name="name" value="{{$slider->name}}" class="form-control @error('name') is-invalid @enderror"   placeholder="Nhập tên menu">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div    class="form-group">
                                <label >Mô tả</label>
                                <textarea type="text" rows="4" name="descripiton" class="form-control @error('descripiton') is-invalid @enderror" >  {{$slider->descripiton}}</textarea>
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

                                <div class="col-md-3">
                                    <div class="row">
                                        <img src="{{$slider->image_path}}" alt="">
                                    </div>
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

