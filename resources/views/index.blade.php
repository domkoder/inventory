@extends('layouts.master')
      @section('title')

      @endsection

      @section('content')
      @if(Auth::check())
          @if(Auth::user()->role('admin') || Auth::user()->role('support'))
                <hr>
                <div id="hideForm">
                        <div>
                           @include('layouts.alert')
                        </div>
                           <form method="post"  action=" <?php if ($edit == 0) {echo "/asset/save";} elseif ($edit == 1) {echo "/edit/asset/".$asset->id;} ?>">
                                 {{csrf_field()}}
                              <label> <b>Asset :</b> </label>
                                 <input  name="asset" placeholder="Asset" type="text" style="border-radius: 5px;" value="<?php if ($edit == 1){echo $asset->asset;}?>">

                              <label> <b>Description :</b> </label>
                              <textarea name="description" placeholder="Describe the item" rows="4" style="border-radius: 5px;"><?php if ($edit == 1){echo $asset->description;}?></textarea>

                             <label> <b>Location :</b> </label>
                               <select name="location" id="location" style="border-radius: 5px;">
                                        @if($edit == 1)
                                            <option value="{{$asset->Location->id}}"> {{$asset->Location->location}}</option>
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
                                                        <option value="{{ $asset->Office->id}}"> {{ $asset->Office->office}}</option>
                                                        @foreach($offices as $office)
                                                            <option value="{{$office->id}}">{{$office->office}}</option>
                                                        @endforeach
                                                   </select>
                                              @endif                    
                                       </div>
                                   </div>

                              <button class="small button" style="border-radius: 5px;">submit</button>
                           </form>
                   </div>
          @endif
      @endif
      @endsection

      @section('table')
            @if(count($assets))
                  <div class =""  style="padding-top: 30px;">
                        <h3 style="text-align: center;">Assets</h3>
                        <hr>
                        <table>
                              <thead>
                                <tr>
                                  <th>S/N</th> 
                                  <th>ASSET</th>           
                                  <th>NUMBER</th>
                                    <th>ACCTION</th>
                                </tr>
                              </thead>
                              <tbody>
                            @foreach($assets as $asset)
                                  <tr>
                                      <td>{{ $asset->id }}</td>
                                      <td>{{ $asset->asset }}</td>
                                      <td>{{ $asset->number }}</td>
                                      <td>
                                  @if(Auth::check())
                                      @if(Auth::check() &&  Auth::user()->role('admin') || Auth::user()->role('support'))
                                            <a href="/asset/delete/{{ $asset->id }}" style="color: red;">
                                              <img src="/DeleteRed.png" style="height: 25px;">
                                            </a>&nbsp&nbsp&nbsp&nbsp
                                            
                                            <a href="/edit/asset/{{ $asset->id }}">
                                              <img src="/Edit-icon.png" style="height: 25px;">
                                            </a>&nbsp&nbsp&nbsp&nbsp
                                      @endif 
                                  @endif     
                                        <a href="/view/asset/{{ $asset ->id }}" style="color: green;">
                                          <img src="/eye-512.png" style="height: 25px;">
                                        </a></td>
                                  </tr>
                            @endforeach
                              </tbody>
                        </table>

                  @else
                        <div class="callout" style="border-radius: 5px; text-align: center; background-color: #1779ba;">
                              <h2>Empty</h2>
                              <p>There are no asset added yet .</p>
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