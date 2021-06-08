
@extends('layouts.admin')

@section('title', 'Trang chủ')

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'category',  'key'=> ' list'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
 
            <div class="col-md-12"> 
              @can('/categories/add')
                <a href="{{ url('/admin/categories/create') }}" class="btn btn-success float-right m-2">Add</a>
              @endcan
        
        
              </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Action</th>
                      
                      </tr>
                    </thead>
                    <tbody>


                      @foreach ($categories as  $category )
                        
                      <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                          @can('/categories/edit')
                           <a href="{{ url("/admin/categories/edit/$category->id") }}" class="btn btn-default">Edit</a>
                          @endcan
                        
                          @can('/categories/delete')
                           <a href="" data-url="{{ url("/admin/categories/delete/$category->id") }}" class="btn btn-danger action_delete">Delete</a>
                          @endcan

                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>
            
            <div class="col-md-6">
              {{ $categories->links() }}
            </div>

        </div>
       
      </div><!-- /.container-fluid -->

  
    </div>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
@endsection

