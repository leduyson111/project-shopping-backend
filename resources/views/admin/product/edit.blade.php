
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
   @include('partials.content-header', ['name'=>'product',  'key'=> ' edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ url("/admin/product/update/$product->id") }}" enctype="multipart/form-data" method="POST">

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                @csrf
                <div class="form-group">
                  <label >Tên sản phẩm</label>
                  <input type="text" name="name" value="{{ $product->name }}" class="form-control"   placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label>Chọn danh mục</label>
                    <select class="form-control select2_inti" name="category_id">
                      <option value="">Chọn danh mục</option>
                        {!! $htmlOption !!}
                    </select>
                  </div>

                <div class="form-group">
                    <label >giá sản phẩm</label>
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}"   placeholder="giá sản phẩm">
                </div>
                  
                <div class="form-group">
                    <label >Ảnh đại diên sản phẩm</label>
                    <input type="file" name="feature_image_path" class="form-control-file"   placeholder="Ảnh đại diên sản phẩm">
                  <div class="col-md-12">
                      <div class="row">
                          <img width="300px" src="{{ $product->feature_image_path }}" alt="">  
                      
                      </div>  
                  
                  </div>  
               
                </div>

                <div class="form-group container_image_detail" >
                    <label >Ảnh chi tiết </label>
                    <input type="file" multiple name="image_path[]" class="form-control-file"   placeholder="Ảnh đại diên sản phẩm">
                  <div class="col-md-12">
                      <div class="row">
                        @foreach ($product->productImages as  $productImageItem)
                          <div class="col-md-3">
                            <img class="image_detail" src="{{ $productImageItem->image_path }}" alt="">
                          </div>
                          @endforeach
                      </div>


                  </div>
              
              
                  </div>

                <div class="form-group">
                    <label >Nhập tags cho sản phẩm:</label>
                    <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">
                      @foreach ($product->tags as $tagItem  )
                      <option value="{{ $tagItem ->name }}" selected>{{ $tagItem->name }}</option>
                        
                      @endforeach
                      
                    </select>
                </div>
              
            </div>

            <div class="col-12">
              <div class="form-group">
                <label >Nội dung sản phẩm:</label>
                <textarea class="form-control tinymce_editor_init" id="my-editor"  name="contents" rows="8"> {{ $product->content }}</textarea>
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


