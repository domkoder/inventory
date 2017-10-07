
    @extends('layouts.master') 

    @section('content')
        <label>
        	<center>
	        	<h3>
	       		Search for asset by id
	       	</h3>
       	</center>
        <div>
               @include('layouts.alert')
            </div>
       <form method="get" action="/search">
           	<div class="input-group">
		    <input class="input-group-field" type="text" placeholder="Asset id" name="search">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		    <div class="input-group-button">
		    	<input type="submit" class="small button" value="Search">
		    </div>
		</div>
       </form>
       @if($search !== 0) 
       	<center>
       		Report issue
       	</center>
       <form method="post" action="/report">
            {{csrf_field()}}
       	<label>Conditon</label>
                   <select name="asset" disabled="">
                     <option value="{{ $search->number }}">{{$search->asset}}</option>
                   </select>

            <input type="text" value="{{ $search->number }}" name="asset" hidden="">

            <label>Description</label> 
                  <textarea name="description" placeholder="Describe the item" rows="4"></textarea>

               <button class="small button">Report</button>
                 
       </form>
      @endif
    @endsection