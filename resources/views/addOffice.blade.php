@extends('layouts.master')
@if(Auth::check())
    @if(Auth::user()->role('admin') || Auth::user()->role('support'))
          @section('content')
          <hr>
                <div>
                         @include('layouts.alert')
                </div>
          	<form action=" <?php if ($edit == 0) {echo "/asset/save/office";} elseif ($edit == 1) {echo "/asset/edit/office/".$office->id;} ?>" method="post">
                      {{ csrf_field() }}
                  <label>
                      Location
                  </label>
                     <select name="location" style="border-radius: 5px;">
                          @if($office !== 0)
                              <option value="{{$office->location->id}}"> {{$office->location->location}}</option>
                          @else
                              <option value="">Select</option>
                          @endif
                          @foreach($locations as $location)
                             <option value="{{ $location->id }}">{{ $location->location }}</option>
                          @endforeach
                     </select>
                   

          	  <label>Office
          	    <input type="text" placeholder="Add Office" style="border-radius: 5px;" name="office" value="<?php if ($edit == 1){echo $office->office;}?>">
          	  </label>
          	  <button class="small button" style="border-radius: 5px;">submit</button>
            	</form>
          @endsection
    @endif
@endif

@section('table')
@if(count($offices))

      <div class =""  style="padding-top: 30px;">
      <h3 style="text-align: center;">Offices</h3>
      <hr>
            <table>
                  <thead>
                    <tr>
                      <th>S/N</th>  
                      <th>OFFICE</th>
                      <th>LOCATION</th>
                        <th>ACCTION</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($offices as $office )
                            <tr>
                              <td>{{ $office->id }}</td>
                              <td>{{ $office->office }}</td>
                              <td>{{ $office->Location->location }}</td>
                              <td>
                      @if(Auth::check())
                           @if(Auth::user()->role('admin') || Auth::user()->role('support'))
                                <a href="/asset/delete/office/{{$office->id}}" style="color: red;">
                                    <img src="/DeleteRed.png" style="height: 25px;">
                                </a>&nbsp&nbsp&nbsp&nbsp

                                <a href="/asset/edit/office/{{$office->id}}">
                                     <img src="/Edit-icon.png" style="height: 25px;">
                                </a>&nbsp&nbsp&nbsp&nbsp
                           @endif
                      @endif
                                <a href="/asset/view/office/{{$office->id}}" style="color: green;"><img src="/eye-512.png" style="height: 25px;"></a></td>
                            </tr>
                        @endforeach
                  </tbody>
          </table>
          @else
                <div class="callout" style="border-radius: 5px; text-align: center; background-color: #1779ba;">
                      <h2>Empty</h2>
                      <p>There are no office added yet .</p>
                </div>
    </div>
@endif
@endsection