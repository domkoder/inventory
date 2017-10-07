@extends('layouts.master') 

@section('style')

@endsection

@if(Auth::check() && Auth::user()->role('admin') && count($pendings))
      @section('table')
            <div class =""  style="padding-top: 30px;">
		      <h3 style="text-align: center;">pendings</h3>

		      <hr>
		      <div>
                     @include('layouts.alert')
            </div>
		            <table>
		                  <thead>
		                    <tr>
		                      	<th>S/N</th>  
		                      	<th>ASSET NUMBER</th>
		                      	<th>STATUS</th>
		                        <th>ACCTION</th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                        @foreach($pendings as $pending )
		                            <tr>
		                              <td>{{ $pending->id }}</td>
		                              <td>{{ $pending->asset_id }}</td>
		                              <td>{{ $pending->status }}</td>
		                              <td>
		                        @if(Auth::check() && Auth::user()->role('admin'))
		                                    <a href="">
		                                     	<img src="/eye-512.png" style="height: 25px;">
		                                    </a>&nbsp&nbsp&nbsp&nbsp
		                                	<a id="myBtn">
		                                		<img src="/Icon5.png" style="height: 25px;">
		                                	</a>
		                                	 {{ $pending->asset_id}}

			                              <div id="myModal" class="modal">

			                                	<form method="post" action="/myBtn/{{ $pending->asset_id}}">
									  	<div class="modal-content" style="border-radius: 8px;">
										    	<span class="close">&times;</span>
										    	{{ csrf_field() }}
			                                			<!-- <input type="Hidden" name="asset_id" value="{{$pending->asset_id}}"> -->
											<fieldset class="large-6 columns">
												<legend>Assign Supports to this issue</legend>
												            @foreach ($supportUsers as $supportUser) 
												                <input id="" type="checkbox" name = "{{$supportUser->userName}}" value="{{$supportUser->id}}"><label for="supportUser">{{ $supportUser->userName }}&nbsp(support)</label><br>
												            @endforeach
											</fieldset>
												    <input type="submit" class= "button" name="" style="border-radius: 5px; margin-top: 10px;" value="Assign">
									  	</div>
									</form>						
								</div>

								<script>
										
								</script>
		                        @endif
		                            </tr>
		                        @endforeach
		                  </tbody>
		          </table>
		    </div>
      @endsection
@endif