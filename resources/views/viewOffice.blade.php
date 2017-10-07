@extends('layouts.master')
	@section('style')
		<style type="text/css">
			#rcorners3 {
			    border-radius: 8px;
			    box-shadow: 0px 8px 16px 0px #a6a6a6;
			    padding: 20px; 
			    width: 100%;
			    background:  ;

			}

			.stuff{
				padding: 0px;
				margin-top: 0;
				padding-left: 20px;
			}
		</style>
	@endsection()
	@section('content')
			<div id="rcorners3">
				<label>
					<strong>
						Assets: 
					</strong>
				</label>
					<a href=""><p class="stuff">{{ count($office->Assets) }} Asset<hr style="margin: 0;"></p></a>

				<label>
					<strong>
						Office:
					</strong>
				</label>
					<p class="stuff">{{ $office->office}}<hr style="margin: 0;"></p>

				<label>
					<strong>
						Location: 
					</strong>
				</label>
					<a href=""><p class="stuff">{{$office->Location->location}}<hr style="margin: 0;"></p></a>

				<label>
					<strong>
						Users:
					</strong>
				</label>
					<a href=""><p class="stuff">{{ count($office->Users) }} Users<hr style="margin: 0;"></p></a>

				<label>
					<strong>
						Created: 
					</strong>
				</label>
					<p class="stuff">{{ $office->created_at->diffForHumans()  }}</p>
			</div>
	@endsection