
@extends('layouts.admin')
@section('title', 'Silder')


@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Menus',  'key'=> ' list'])


        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="btn-group">
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                Action
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a  href="{{url('admin/settings/create/?type=Text')}}">Text</a></li>
                                <li><a  href="{{url('admin/settings/create/?type=Textarea')}}">Textarea</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                           @foreach ($settings as  $setting )
                               <tr>
                                   <th scope="row">{{ $setting->id }}</th>
                                   <td>{{ $setting->config_key }}</td>
                                   <td>{{ $setting->config_value }}</td>
                                   <td>
                                       <a href="{{ url("/admin/settings/edit/$setting->id").'?type='.$setting->type }}" class="btn btn-default">Edit</a>
                                       <a  href="" data-url="{{ url("/admin/settings/delete/$setting->id") }}" class="btn btn-danger action_delete">Delete</a>
                                   </td>
                               </tr>
                           @endforeach 

                            </tbody>
                        </table>
                    </div>

                    {{ $settings->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

