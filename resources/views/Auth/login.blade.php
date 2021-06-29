@extends('layouts.app')

@section('content')
@push('style')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endpush
<script>
@if(session()->has('error'))
toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
          @elseif (session()->has('success'))
          toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('success') }}");
          @endif
</script>
        <div class="container">
<form action="{{route('auth')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="emailid" class="form-label">Email address</label>
      <input type="email" class="form-control" id="emailid" name="email" >
    </div>
    <div class="mb-3">
      <label for="passwd" class="form-label">Password</label>
      <input type="password" class="form-control" id="passwd" name="password">
    </div>
    <button type="submit" class="btn btn-primary">LogIn</button>
  </form>
        </div>
@endsection
