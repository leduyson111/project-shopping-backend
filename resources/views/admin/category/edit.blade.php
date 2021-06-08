
@extends('layouts.admin')

@section('title', 'Sửa danh mục')

@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header', ['name'=>'category',  'key'=> ' edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

            <form action="{{ url("/admin/categories/update/$category->id") }}" method="POST">
                @csrf
                <div class="form-group">
                  <label >Tên danh mục</label>
                  <input type="text" name="name" class="form-control" value="{{ $category->name }}"  placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group" name="parent_id">
                    <label>Chọn danh mục cha</label>
                    <select class="form-control" name="parent_id">
                      <option value="0">Chọn danh mục cha</option>
                        {!! $htmlOption !!}
                    </select>
                  </div>
                  
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

