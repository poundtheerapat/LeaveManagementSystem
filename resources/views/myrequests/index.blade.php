@extends('layouts.user')

@section('main')
<php 
use Illuminate\Support\Facades\DB;
?>
<h1>Current</h1>
<table class="table table-hover" style="margin-top: 50px">
    <thead>
      <tr class="table-primary">
        <th scope="col">Substitute</th>
        <th scope="col">Category</th>
        <th scope="col">Task</th>
        <th scope="col">Start</th>
        <th scope="col">End</th>
        <th scope="col">Status</th>
        <th scope="col">Cancel</th>
      </tr>
    </thead>
    <tbody>
      @foreach($current as $leave)
      <tr class="table-secondary">
      <td>{{ DB::table('users')->where('id',$leave->substitute_id)->first()->firstname }}</td>
        <td>{{ DB::table('categories')->where('id',$leave->category_id)->first()->name }}</td>
        <td>{{ DB::table('tasks')->where('id',$leave->task_id)->first()->name }}</td>
        <td>{{ $leave->start_date }}</td>
        <td>{{ $leave->end_date }}</td>
        <td>{{ $leave->status }}</td>
        <td>
        <a href="{{ url('/myrequests/' . $leave->id.'/cancel') }}">
            Cancel
          </a>
        </td>
        <td>
        <a href="{{ url('/leaves/' . $leave->id) }}">
            View
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- /////////////////////////////////////////////////////////////////////// -->
 <br><h1>History</h1>
<table class="table table-hover" style="margin-top: 50px">
    <thead>
      <tr class="table-primary">        
        <th scope="col">Substitute</th>
        <th scope="col">Category</th>
        <th scope="col">Task</th>
        <th scope="col">Start</th>
        <th scope="col">End</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($history as $leave)
      <tr class="table-secondary">
        <td>{{ DB::table('users')->where('id',$leave->substitute_id)->first()->firstname }}</td>
        <td>{{ DB::table('categories')->where('id',$leave->category_id)->first()->name }}</td>
        <td>{{ DB::table('tasks')->where('id',$leave->task_id)->first()->name }}</td>
        <td>{{ $leave->start_date }}</td>
        <td>{{ $leave->end_date }}</td>
        <td>{{ $leave->status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection