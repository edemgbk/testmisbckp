@extends('layouts.app')

@section('content')

  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">category</li>
    </ol>
    <div class="container-fluid">
      <div class="ui-view">
        <div class="row">
          <!-- /.col-->
          <div class=" col-sm-12 col-md-12 accordion" id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <i class="icon-note"></i>Add category
                <div class="card-header-actions">
                  <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h6>Simple Form</h6>
                    <form id="roleForm"   method="POST" action="{{ route('user-management.categories.create')}}">
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
                        <label class="col-form-label" for="username">Description</label>
                        <input class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" type="text" name="description" value="{{ old('description')}}" placeholder="description" />
                        @if ($errors->has('description'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('description') }}</small>
                          </p>
                        @endif
                      </div>



                      {{--<script src="{{asset('js/advanced-forms.js')}}" defer>--}}
                          {{--$('#select2-1, #select2-2, #select2-4').select2({--}}
                              {{--theme: 'bootstrap'--}}
                          {{--});--}}
                      {{--</script>--}}


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
              <i class="fa fa-edit"></i> List categories
              <div class="card-header-actions">

              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                  <th>Name</th>

                  <th>Description</th>

                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($Categories->count() > 0)
                  @foreach($Categories as $category)
                <tr>
                  <td>{{$category->name}}</td>
                  <td>{{$category->description}}</td>

                  <td>
                    <a class="btn btn-success" href="
                    {{route('user-management.categories.view',[\Illuminate\Support\Facades\Crypt::encrypt($category->id)])}}
                    ">
                      view<i class="fa fa-search-plus"></i>
                    </a>
                    <a class="btn btn-info" href="
                    {{route('user-management.categories.edit',[\Illuminate\Support\Facades\Crypt::encrypt($category->id)])}}
                    ">
                     edit <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger" href="" onclick="deleteCategory('{{$category->id}}')">
                     delete <i class="fa fa-trash-o"></i>
                    </a>

                     <form id="delete-form{{$category->id}}" action="
                        {{-- {{ route('user-management.categories.delete') }} --}}
                        " method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id" value="{{\Illuminate\Support\Facades\Crypt::encrypt($category->id)}}">
                      </form>

                  </td>
                </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="4" class="text-center">No category  Set</td>
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
    function deleteCategory(key) {


        if (confirm('Are you sure, you want to delete this role?')) {
            event.preventDefault();
            document.getElementById('delete-form' + key).submit();
        } else {
            event.preventDefault();
            document.getElementById('delete-form' + key).reset();
        }




    }



                                </script>
