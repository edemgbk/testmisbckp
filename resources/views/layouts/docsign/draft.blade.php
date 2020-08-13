<div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <h6>Simple Form</h6>
        <form id="roleForm"   method="POST" action="">
          @csrf

          <div class="form-group">
            <label class="col-form-label" for="name">Name</label>
            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name')}}" placeholder=" Enter Name" />
            @if ($errors->has('name'))
              <p class="text-right mb-0">
                <small class="warning text-muted">{{ $errors->first('name') }}</small>
              </p>
            @endif

          </div>
          <div class="form-group">
            <label class="col-form-label" for="Address">Address</label>
            <input class="form-control {{ $errors->has('Address') ? ' is-invalid' : '' }}" id="Address" type="text" name="Address" value="{{ old('Address')}}" placeholder="Enter Address" />
            @if ($errors->has('Address'))
              <p class="text-right mb-0">
                <small class="warning text-muted">{{ $errors->first('Address') }}</small>
              </p>
            @endif
          </div>

          <div class="form-group">
            <label class="col-form-label" for="username">AccountNo.</label>
            <input class="form-control {{ $errors->has('AccountNo') ? ' is-invalid' : '' }}" id="AccountNo" type="text" name="AccountNo" value="{{ old('AccountNo')}}" placeholder="Enter AccountNo" />
            @if ($errors->has('AccountNo'))
              <p class="text-right mb-0">
                <small class="warning text-muted">{{ $errors->first('AccountNo') }}</small>
              </p>
            @endif
          </div>
          <div class="form-group">
            <label class="col-form-label" for="Date">Date</label>
            <input class="form-control {{ $errors->has('Date') ? ' is-invalid' : '' }}" id="Date" type="Date" name="Date" value="{{ old('Date')}}" placeholder=" Enter Date" />
            @if ($errors->has('Date'))
              <p class="text-right mb-0">
                <small class="warning text-muted">{{ $errors->first('Date') }}</small>
              </p>
            @endif
          </div>
          <div class="form-group">
            <label class="col-form-label" for="Date">Description</label>
            <input class="form-control {{ $errors->has('Description') ? ' is-invalid' : '' }}" id="Description" type="text" name="Description" value="{{ old('Description')}}" placeholder="Enter Description" />
            @if ($errors->has('Description'))
              <p class="text-right mb-0">
                <small class="warning text-muted">{{ $errors->first('Description') }}</small>
              </p>
            @endif
          </div>

          {{--<script src="{{asset('js/advanced-forms.js')}}" defer>--}}
              {{--$('#select2-1, #select2-2, #select2-4').select2({--}}
                  {{--theme: 'bootstrap'--}}
              {{--});--}}
          {{--</script>--}}

          {{-- @if($permissions->count() > 0) --}}
          <fieldset class="form-group">
            <label  class="col-form-label" for="permission" >N/B</label>
            {{-- <select class="form-control select2-multiple" name="permissions[]" id="select2-2" multiple="multiple" required > --}}

              {{-- @foreach($permissions as $permission)
              <option value="{{$permission->id}}">{{$permission->name}}</option>
              @endforeach --}}

            {{-- </select> --}}
            @if ($errors->has('permissions'))
            <p class="text-right">
            <small class="warning text-muted">{{ $errors->first('permissions') }}</small>
            </p>
            @endif
          </fieldset>

          {{-- @else --}}
          <div class="form-group">
          <label for="message">{{__('notce')}}</label>
          </div>
          {{-- @endif --}}
          <div class="form-group">
            <button class="btn btn-primary" type="submit" name="save" value="save">Save as draft</button>
            <button class="btn btn-primary" type="submit" name="save" value="save">Save & Send </button>

            {{-- <button class="btn btn-primary" type="submit" name="save" value="save">Save &</button> --}}

          </div>

        </form>
      </div>
    </div>
  </div>
