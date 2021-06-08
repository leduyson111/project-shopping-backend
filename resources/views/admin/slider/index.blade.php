
@extends('layouts.admin')
@section('title', 'Silder')

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/slider/index.js') }}"></script>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'slider',  'key'=> ' list'])


        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                         <a href="{{ url('/admin/slider/create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sliders as  $slider )
                                <tr>
                                    <th scope="row">{{ $slider->id }}</th>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->descripiton }}</td>
                                    <td><img width="300" height="auto" src="{{$slider->image_path}}" alt=""></td>
                                    <td>
                                        <a href="{{ url("/admin/slider/edit/$slider->id") }}" class="btn btn-default">Edit</a>
                                        <a  href="" data-url="{{ url("/admin/slider/delete/$slider->id") }}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>


        </div>


    </div>
@endsection

