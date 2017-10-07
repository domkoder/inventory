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
					<a href=""><p class="stuff">{{ count($location->Assets) }} Asset<hr style="margin: 0;"></p></a>

				<label>
					<strong>
						Location:
					</strong>
				</label>
					<p class="stuff">{{ $location->location}}<hr style="margin: 0;"></p>

				<label>
					<strong>
						Offices: 
					</strong>
				</label>
					<a href=""><p class="stuff">{{ count($location->Offices) }} Offices<hr style="margin: 0;"></p></a>

				<label>
					<strong>
						Users:
					</strong>
				</label>
					<a href=""><p class="stuff">{{ count($location->Users) }} Users<hr style="margin: 0;"></p></a>

				<label>
					<strong>
						Created: 
					</strong>
				</label>
					<p class="stuff">{{ $location->created_at->diffForHumans()  }}</p>
			</div>
	@endsection