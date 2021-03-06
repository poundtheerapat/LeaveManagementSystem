@extends('layouts.app')

@section('content')
<br><br>
<div class="row">
	<div class="col-2" style="margin: 10px" >
	    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	        <a class="nav-link active"  href="/admin" aria-selected="true">Home</a>
	        <a class="nav-link"  href="/admin/departments/view" aria-selected="false">Departments</a>
	        
	        <!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Users</a> -->
	        <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              Users
	            </a>
	            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	              <a class="dropdown-item" href="/admin/users/create">Create users</a>
	              <a class="dropdown-item" href="/admin/users/view">View all users</a>
	 
	        </li>
	        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Categories</a>
	        <a class="nav-link" href="/admin/positions/view" role="tab"  aria-selected="false">Positions</a>
	    </div>
	</div>
	<div class="col-md-9" style="margin: 10px">
		<h2>All Categories</h2>
		<hr>
		<br>
		<center>
			<form class="form-inline" action="/admin/categories/view" method="post">
				@csrf
			  <div class="form-row align-items-center">
			    	<h4 style="margin: 5px">Create category: </h4>
				      <label class="sr-only" for="inlineFormInput">Create category</label>
				      <input type="text" name="name" style="margin: 5px" class="form-control " id="inlineFormInput" placeholder="category's name...">
				      <input type="text" name="days" style="margin: 5px" class="form-control " id="inlineFormInput" placeholder="days...">

				      <button type="submit" style="margin: 5px" class="btn btn-primary mb-2">Submit</button>
			  </div>
	
			</form>
		</center>
		<br>
		<!-- Department table -->
		

	<div class="contrainer">
		 <table class="table table-hover table-bordered table-striped">
	    <thead>
	      <tr>
	        <th>id</th>
	        <th>Category's name</th>
	        <th>Days</th>
	      </tr>
	    </thead>
	    <tbody> 
	    	@foreach($categories as $category)
	    	<tr>
	    		<th scope="row">{{ $loop->iteration }}</th>
			        <td>
			          <a>
			            {{ $category->name }}
			          </a>
			        </td>
			        <td>
			          <a>
			            {{ $category->days }}
			          </a>
			        </td>
			        <td>
			            <a href="/admin/categories/{{$category->id}}/edit" class="btn btn-warning" role="button">Edit</a>
			        </td>
			        <td>
			             <form style="margin:0px" name="name" action="/admin/categories/{{ $category->id }}" method="post">
			                @csrf
			                @method("DELETE")
			                <button class="btn btn-danger" role="button" type="summit">Delete</button>            
			              </form>
          			</td>
	    	</tr>
	    	 @endforeach
	    </tbody>
	  </table>
	  <form method="get" action="{{route("admin.categories.getpdf")}}">
            <button type="submit">Download as PDF</button>
      </form>
	</div>
	</div>
</div>


@endsection