  @extends('layouts.master') 

@section('content')
	<div class="grid-container" style="padding-top: 40px;">
         <div class="">
         	@include('layouts.alert')
         	<form method="post" action="/register">
         		{{csrf_field()}}
   			<label>User Name</label>
			    <input type="text"  name="userName">

			<label>Password</label>
			    <input type="password" name="password">

			<label>Password Confirmation</label>
			    <input type="password"  name="password_confirmation">

			<button class="small button">submit</button>
		</form>
         </div>
      </div>
@endsection
