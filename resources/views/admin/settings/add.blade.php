
@extends('layouts.admin')

@section('title', 'Thêm settings')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'settings',  'key'=> ' add'])
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <form action='{{ url("/admin/settings/store").'?type='.request()->type }}' method="POST">
                            @csrf
                            <div class="form-group">
                                <label >Config key</label>
                                <input type="text" name="config_key" class="form-control @error('config_key') is-invalid @enderror"   placeholder="Config key">
                            
                                @error('config_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>

                            @if(request()->type === 'Text')
                                <div class="form-group">
                                    <label >Config value</label>
                                    <input type="text"  placeholder="config value" name="config_value" class="form-control @error('config_value') is-invalid @enderror"   placeholder="Config value">
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                               
                                </div>

                            @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label >Config value</label>
                                    <textarea type="text" placeholder="config value" rows="6" name="config_value" class="form-control @error('config_value') is-invalid @enderror"  ></textarea>
                               
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                </div>

                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection

