<!DOCTYPE html>
<html>
	<head>
		<script src="/js/vendor/jquery.js">
		</script>
		<title>test</title>
		<script>
			$(document).ready(function(){
			    	$("#location").change(function(){
			            var name = $("#location").val();
			           alert(name);
				     $.ajax({
			                 url: '{{ url('get/offices') }}/'+name,
			                 type: 'GET',
			                 dataType: 'json',
			           	     data:{location:name}
		                 });
			    });
			});
		</script>
	</head>
	<body>
			<label>Location</label>
	                   	<select name="location" id="location">
		                     <option value="buildingA">Building A</option>
		                     <option value="buildingB">Building B</option>
		                     <option value="buildingC">Building C</option>
		                     <option value="buildingD">Building D</option>
	                   	</select>
		<button>Show Value</button>
</body>
</body>
</html>
