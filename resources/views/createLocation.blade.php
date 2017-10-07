
    @extends('layouts.master') 

    @if(Auth::check())
          @if(Auth::user()->role('admin') || Auth::user()->role('support'))
                @section('content')
                <div>
                    @include('layouts.alert')
                </div>
                       <form action="<?php if ($edit == 0) {echo "/asset/save/location";}elseif ($edit == 1) {echo "/asset/edit/location/".$location->id;}?>" method="post">
                            {{ csrf_field()}} 
                            <label>Location 
                            <input name="location" style="border-radius: 5px;" placeholder="Create Location" type="text" value="<?php if ($location !== 0){echo $location->location;}?>" >
                            </label> 
                            <button class="small button" style="border-radius: 5px;">submit</button>
                       </form>
                @endsection 
           @endIf
      @endif

    @section('table')
      @if(count($locations))
      <div class="">
        <table>
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>LOCATION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
                  @foreach($locations as $location)
                  <tbody>
                      <tr>
                          <td>{{ $location->id }}</td>
                          <td><a href="">{{ $location->location }}</a></td>
                          <td>
                                 @if(Auth::check())
                                      @if(Auth::user()->role('admin') || Auth::user()->role('support'))
                                            <a href="/asset/delete/location/{{ $location->id }}" style="color: red;">
                                              <img src="/DeleteRed.png" style="height: 25px;">
                                            </a>&nbsp&nbsp&nbsp&nbsp
                                            <a href="/asset/edit/location/{{ $location->id }}">
                                              <img src="/Edit-icon.png" style="height: 25px;">
                                            </a>&nbsp&nbsp&nbsp&nbsp
                                      @endif
                                 @endif

                                <a href="/asset/view/location/{{ $location->id }}" style="color: green;">
                                  <img src="/eye-512.png" style="height: 25px;">
                                </a>
                          </td>
                      </tr>
                  </tbody>
                  @endforeach
        </table>
        @else
              <div class="callout" style="border-radius: 5px; text-align: center; background-color: #1779ba;">
                    <h2>Empty</h2>
                    <p>There are no service added yet .</p>
              </div>
      </div>
      @endif
    @endsection