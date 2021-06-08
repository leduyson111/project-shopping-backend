
@extends('layouts.admin')

@section('title', 'Thêm danh mục')

@section('css')

<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admins/product/add/add.css') }}">

@endsection





@section('content')




<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header', ['name'=>'product',  'key'=> ' add'])
    <!-- /.content-header -->
     <div class="col-md-12">
{{--         @if ($errors->any())--}}
{{--             <div class="alert alert-danger">--}}
{{--                 <ul>--}}
{{--                     @foreach ($errors->all() as $error)--}}
{{--                         <li>{{ $error }}</li>--}}
{{--                     @endforeach--}}
{{--                 </ul>--}}
{{--             </div>--}}
{{--         @endif--}}
     </div>
    <!-- Main content -->
    <form action="{{ url('/admin/product/store') }}" enctype="multipart/form-data" method="POST">

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                @csrf
                <div class="form-group">
                  <label >Tên sản phẩm</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"   placeholder="Tên sản phẩm">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label>Chọn danh mục</label>
                    <select class="form-control select2_inti @error('category_id') is-invalid @enderror"  name="category_id">
                      <option value="">Chọn danh mục</option>
                        {!! $htmlOption !!}
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                <div class="form-group">
                    <label >giá sản phẩm</label>
                    <input type="text"  value="{{ old('price') }}"  name="price" class="form-control  @error('price') is-invalid @enderror"   placeholder="giá sản phẩm">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                    <label >Ảnh đại diên sản phẩm</label>
                    <input type="file" name="feature_image_path" class="form-control-file  @error('feature_image_path') is-invalid @enderror"   placeholder="Ảnh đại diên sản phẩm">

                    @error('feature_image_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label >Ảnh chi tiết </label>
                    <input type="file" multiple name="image_path[]" class="form-control-file"   placeholder="Ảnh đại diên sản phẩm">
                </div>

                <div class="form-group">
                    <label >Nhập tags cho sản phẩm:</label>
                    <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">
                    </select>
                </div>

            </div>

            <div class="col-12">
              <div class="form-group">
                <label >Nội dung sản phẩm:</label>
                <textarea class="@error('contents') is-invalid @enderror  form-control tinymce_editor_init " id="my-editor"  name="contents" rows="8">{{ old('contents') }} </textarea>
                  @error('contents')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

              </div>

            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>

      </div>
    </div>
  </form>



  </div>

@endsection


@section('js')

<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>


@endsection


