@extends('layouts.master') 

@section('content')
	<div class="grid-container" style="padding-top: 50px;">
	<h4>login</h4>
	<hr>
         <div class="">
         	@include('layouts.alert')
         	<form method="post" action="/login">
         		{{csrf_field()}}
   			<label>User Name</label>
			    <input type="text"  name="username" style="border-radius: 5px;">

			<!-- <label>Password</label>
			    <input type="password" name="password" style="border-radius: 5px;"> -->

			<button class="small button" style="border-radius: 5px;">submit</button>
		</form>
         </div>
      </div>
@endsection