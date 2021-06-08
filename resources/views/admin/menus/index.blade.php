
@extends('layouts.admin')

@section('title', 'Trang chủ')
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection


@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection



@section('content')
 <div class="content-wrapper">
    @include('partials.content-header', ['name'=>'menus',  'key'=> ' list'])

    <div class="content">

      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">
            <a href="{{ url('/admin/menus/create') }}" class="btn btn-success float-right m-2">Add</a>
        </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên menu</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($menus as  $menu )
                      <tr>
                        <th scope="row">{{ $menu->id }}</th>
                        <td>{{ $menu->name }}</td>
                        <td>
                          <a href="{{ url("/admin/menus/edit/$menu->id") }}" class="btn btn-default">Edit</a>
                          <a href="" data-url="{{ url("/admin/menus/delete/$menu->id") }}" class="btn btn-danger action_delete">Delete</a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
            </div>

        </div>
        {{ $menus->links() }}
      </div>
    </div>
  </div>
@endsection


