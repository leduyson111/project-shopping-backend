
@extends('layouts.admin')

@section('title', 'Danh sách sản phẩm')

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admins/product/index/list.js') }}"></script>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'product',  'key'=> ' list'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
@if (session('status'))
  <div class="alert alert-primary" role="alert">
    {{ session('status') }}
  </div>
@endif

      <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <a href="{{ url('/admin/product/create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>


                      @foreach ($products as  $product )

                      <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>
                           <img  class="image_product" src="{{ $product->feature_image_path }}" alt="{{ $product->name }}">
                        </td>

                        <td>{{ optional($product->category)->name }}</td>
                        <td>
                          <a href="{{ url("/admin/product/edit/$product->id") }}" class="btn btn-default">Edit</a>
                          <a href="" data-url="{{ url("/admin/product/delete/$product->id") }}"  class="btn btn-danger action_delete">Delete</a>

                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
            </div>

            {{ $products->links() }}

        </div>

      </div>


    </div>
  </div>

@endsection


