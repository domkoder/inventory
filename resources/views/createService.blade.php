@extends('layouts.master')
      @section('title')

      @endsection

      @section('content')
     @if(Auth::check())
          @if(Auth::user()->role('admin') || Auth::user()->role('support'))
                <hr>
                <div>
                   @include('layouts.alert')
                </div>
                     <form method="post" action=" <?php if ($edit == 0) {echo "/service/save";} elseif ($edit == 1) {echo "/edit/service/".$service->id;} ?>">
                           {{csrf_field()}}
                        <label> <b>Service :</b> </label>
                           <input  name="service" placeholder="service" type="text" style="border-radius: 5px;" value="<?php if ($edit == 1){echo $service->service;}?>">

                        <label> <b>Description :</b> </label>
                        <textarea name="description" placeholder="Describe the item" rows="4" style="border-radius: 5px;"><?php if ($edit == 1){echo $service->description;}?>
                        </textarea>

                       <label> <b>Location :</b> </label>
                          <select name="location" id="location" style="border-radius: 5px;">
                                  @if($edit == 1)
                                      <option value="{{$service->Location->id}}"> {{$service->Location->location}}</option>
                                  @else
                                      <option value="">Select</option>
                                  @endif

                                   @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->location}}</option>
                                   @endforeach
                           </select>

                                <div id="package_div_html">     
                                     <label><b>offices :</b></label> 
                                            <div id="me">
                                              @if($offices !== 0)
                                                  <select name="office" id="location" style="border-radius: 5px;">
                                                        <option value="{{ $service->Office->id}}"> {{ $service->Office->office}}</option>
                                                        @foreach($offices as $office)
                                                            <option value="{{$office->id}}">{{$office->office}}</option>
                                                        @endforeach
                                                   </select>
                                              @endif                    
                                            </div>                 
                                </div>

                        <button class="small button" style="border-radius: 5px;">submit</button>
                     </form>
                @endif
           @endif
      @endsection

      @section('table')
            @if(count($services))
                  <div class =""  style="padding-top: 30px;">
                        <h3 style="text-align: center;">SERVICES</h3>
                        <hr>
                        <table>
                              <thead>
                                <tr>
                                  <th>S/N</th> 
                                  <th>SERVICE</th>           
                                    <th>ACCTION</th>
                                </tr>
                              </thead>
                              <tbody>
                            @foreach($services as $service)
                                  <tr>
                                      <td>{{ $service->id }}</td>
                                      <td>{{ $service->service }}</td>
                                      <td>
                                 @if(Auth::check())
                                      @if(Auth::user()->role('admin') || Auth::user()->role('support'))
                                            <a href="/service/delete/{{ $service->id }}" style="color: red;">
                                              <img src="/DeleteRed.png" style="height: 25px;">
                                            </a>&nbsp&nbsp&nbsp&nbsp
                                            
                                            <a href="/edit/service/{{ $service->id }}">
                                              <img src="/Edit-icon.png" style="height: 25px;">
                                            </a>&nbsp&nbsp&nbsp&nbsp
                                      @endif
                                 @endif     
                                        <a href="/view/service{{ $service ->id }}" style="color: green;">
                                          <img src="/eye-512.png" style="height: 25px;">
                                        </a></td>
                                  </tr>
                            @endforeach
                              </tbody>
                        </table>

                  @else
                        <div class="callout" style="border-radius: 5px; text-align: center; background-color: #1779ba;">
                              <h2>Empty</h2>
                              <p>There are no service added yet .</p>
                        </div>
                  </div>
      @endif
      @endsection

    <script src="/js/vendor/jquery.js">
    </script> 
    <script>
            $(document).ready(function(){
               $("#location").change(function(e){
                     var $name = $("#location").val();
                    $("select").remove( "#remove_select" );
                $.ajax({
                       url: '{{ url('/get/offices') }}/'+$name,
                       type: 'GET',
                       dataType: 'html',
                       success: function(data)
                       {
                       $("#package_div_html").append(data);
                       }
                   });
                 });

               $("#location").change(function(){
                    $("#me").hide();
                });
            });
  </script>