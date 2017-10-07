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
						Asset: 
					</strong>
				</label>
					<p class="stuff">{{strtoupper( $asset->asset )}}<hr style="margin: 0;"></p>

				<label>
					<strong>
						Description: 
					</strong>
				</label>
					<p class="stuff">{{strtoupper( $asset->description )}}<hr style="margin: 0;"></p>

				<label>
					<strong>
						Location:
					</strong>
				</label>
					<a href=""><p class="stuff">{{strtoupper( $asset->Location->location )}}<hr style="margin: 0;"></p></a>

				<label>
					<strong>
						Office: 
					</strong>
				</label>
					<a href=""><p class="stuff">{{strtoupper( $asset->Office->office )}}<hr style="margin: 0;"></p></a>

				<label>
					<strong>
						User Name:
					</strong>
				</label>
					<a href=""><p class="stuff">(Admin) {{ strtoupper( $asset->User->userName)}}<hr style="margin: 0;"></p></a>

				<label>
					<strong>
						Asset Number: 
					</strong>
				</label>
					<p class="stuff">{{$asset->number}}<hr style="margin: 0;"></p>

				<label>
					<strong>
						Created: 
					</strong>
				</label>
					<p class="stuff">{{  $asset->created_at->diffForHumans()  }} </p>
			</div>
	@endsection