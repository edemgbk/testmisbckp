@extends('layouts.app')

@section('content')

  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">Currencies</li>
    </ol>
    <div class="container-fluid">
      <div class="ui-view">
        <div class="row">
          <!-- /.col-->
          <div class=" col-sm-12 col-md-12 accordion" id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <i class="icon-note"></i>Add Currencies
                <div class="card-header-actions">
                  <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h6>Simple Form</h6>
                    <form id="roleForm"   method="POST" action="{{ route('user-management.currencies.create')}}">
                      @csrf

                      <div class="form-group">
                        <label class="col-form-label" for="name">Name</label>
                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name')}}" placeholder=" name" />
                        @if ($errors->has('name'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('name') }}</small>
                          </p>
                        @endif

                      </div>

                      <div class="form-group">
                        <label class="col-form-label" for="username">Currency Symbol</label>
                        <input class="form-control {{ $errors->has('Symbol') ? ' is-invalid' : '' }}" id="Symbol" type="text" name="symbol" value="{{ old('Symbol')}}" placeholder="Symbol" />
                        @if ($errors->has('Symbol'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('Symbol') }}</small>
                          </p>
                        @endif
                      </div>



                      {{--<script src="{{asset('js/advanced-forms.js')}}" defer>--}}
                          {{--$('#select2-1, #select2-2, #select2-4').select2({--}}
                              {{--theme: 'bootstrap'--}}
                          {{--});--}}
                      {{--</script>--}}

                      {{-- @if($permissions->count() > 0) --}}


                      {{-- @else --}}

                      {{-- @endif --}}
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="save" value="save">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-edit"></i> List currencies
              <div class="card-header-actions">

              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Symbol</th>

                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
*
                  @if($Currencys->count() > 0)
                  @foreach($Currencys as $Currency)
                <tr>
                  <td>{{$Currency->name}}</td>
                  <td>{{$Currency->symbol}}</td>

                  <td>
                    <a class="btn btn-success" href="{{route('user-management.currencies.view',[\Illuminate\Support\Facades\Crypt::encrypt($Currency->id)])}}">
                     view <i class="fa fa-search-plus"></i>
                    </a>
                    <a class="btn btn-info" href="{{route('user-management.currencies.edit',[\Illuminate\Support\Facades\Crypt::encrypt($Currency->id)])}}">
                     edit <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger" href="" onclick="deleteRole('{{$Currency->id}}')">
                     delete <i class="fa fa-trash-o"></i>
                    </a>

                     <form id="delete-form{{$Currency->id}}"
                            action="{{ route('user-management.currencies.delete') }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id"
                               value="{{\Illuminate\Support\Facades\Crypt::encrypt($Currency->id)}}">
                      </form>

                  </td>
                </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="4" class="text-center">No role  Set</td>
                  </tr>
                @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

    </div>

  </main>

@endsection
<script>
    function deleteRole(key) {


        if (confirm('Are you sure, you want to delete this role?')) {
            event.preventDefault();
            document.getElementById('delete-form' + key).submit();
        } else {
            event.preventDefault();
            document.getElementById('delete-form' + key).reset();
        }




    }



                                </script>
