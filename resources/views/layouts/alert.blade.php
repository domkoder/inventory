@if(count($errors))
	<div class="callout small" style="background-color:#ff9999 ; color: red; border-radius: 5px;">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if($flash = session('message'))
	<div class="callout small" style="background-color:#b3ff99 ; color: green; border-radius: 5px;">
				<li>{{ $flash }}</li>
	</div>
@endif

