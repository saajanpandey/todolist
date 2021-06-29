@extends('layouts.app')

@section('content')

<div class="container p-5">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{url('/task')}}" method="post">
        @csrf
        <div class="row mb-3">
            <label  class="col-sm-2 col-form-label " >Description</label>
            <div class="col-sm-4">
              <input type="text" class="form-control"  name="description">
            </div>
        </div>
        <div class="row mb-3">
            <label  class="col-sm-2 col-form-label " >Start Date Time</label>
            <div class="col-sm-4">
              <input type="text" class="form-control datetimepicker"  name="start_date" >
            </div>
        </div>
        <div class="row mb-3">
            <label  class="col-sm-2 col-form-label">Dead Line</label>
            <div class="col-sm-4">
                <input type="text" name="deadline" class="form-control datetimepicker" >
              </div>
        </div>
        <div class="row mb-3">
            <label  class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-4">
                {{-- <input type="radio" name="status" value="1">Completed --}}
                <input type="radio" name="status" value="0" checked>Ongoing
              </div>
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
      </form>
  </div>



@endsection
@push('custom-script')
<link rel="stylesheet" href="{{asset('css/jquery.datetimepicker.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
<script>
  jQuery('.datetimepicker').datetimepicker();
</script>

@endpush
