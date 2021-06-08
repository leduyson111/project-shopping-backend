
@extends('layouts.admin')

@section('title', 'Thêm menu')

@section('content')
 <div class="content-wrapper">
   @include('partials.content-header', ['name'=>'permissons',  'key'=> ' add'])
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

            <form action="{{ url('/admin/permissions/store') }}" method="POST">
                @csrf
         
                
                <div class="form-group" >
                    <label>Chọn tên module</label>
                    <select class="form-control" name="module_parent">
                      <option value="">Chọn tên module</option>
                        @foreach (config('permissions.table_module') as  $moduleItem)
                        <option value="{{ $moduleItem }}">{{ $moduleItem}}</option>
                        @endforeach
                    </select>
                  </div>

            

         
                  <div class="form-group">
            
                      <div class="row">
                          <div class="col-md-12">
                            <label> 
                              <input type="checkbox"  class="checkall">
                                Checkall
                            </label>
                          </div>

                        @foreach (config('permissions.module_childrent') as  $moduleItemChildrent)
                            <div class="col-md-3">
                              <label for="">
                                  <input type="checkbox" name="module_childrent[]" class="check_one" value="{{ $moduleItemChildrent }}">
                                  {{ $moduleItemChildrent }}
                              </label>
                            </div>
                          @endforeach

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


@section('js')

<script>

  $('.checkall').on('click', function(){
    $(this).parents().find('.check_one').prop('checked',$(this).prop('checked'));

  })
</script>





@endsection
