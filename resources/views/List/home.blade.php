@extends('layouts.app')

@section('content')

@push('style')
<link rel="stylesheet" href="{{asset('css/table.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endpush
<script>
  @if(Session::has('success'))
toastr.options =
{
    "closeButton" : true,
    "progressBar" : true
}
        toastr.success("{{ session('success') }}");

        @elseif(Session::has('info'))
toastr.options =
{
    "closeButton" : true,
    "progressBar" : true
}
        toastr.info("{{ session('info') }}");
@endif
</script>
<a href="{{url('/task/create')}}"><button  class="btn btn-primary">Create Task</button></a>

    <div class="table-container">
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Description</th>
        <th scope="col">Starting Time</th>
        <th scope="col">Ending Time</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $key=>$task )
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$task->name}}</td>
        <td>{{$task->starting_time}}</td>
        <td>{{$task->deadline}}</td>
        <td>
            <a href="{{route('changestatus',['id'=>$task->id])}}"  >
                @if($task->status==1)
                <span class="badge bg-success">Completed</span>
                @else
                <span class="badge bg-danger">Ongoing</span>
                @endif
            </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    </div>
@endsection
