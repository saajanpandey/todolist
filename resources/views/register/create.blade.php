@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endpush
@section('content')



    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{url('/register')}}" method="post">
    @csrf
    <div class="row mb-3">
    </div>
    <div class="row mb-3">
        <label  class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  name="name">
        </div>
    </div>
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" name="email">
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" name="password">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
  </form>
</div>

@endsection
