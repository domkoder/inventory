<?php

	namespace App\Repositories\Location;

	use App\Repositories\Location\LocationContract;
	use App\Office;
	use App\Location;

	/**
	* 
	*/
	class EloquentLocationRepository implements LocationContract
	{

		public function createLocation($request)
		{
			$location = location::where('location', $request->location)->first();
			if (!$location) {
				return	Location::create([
						'location' => $request->location 
					]);
			}
		}

		public function allLocations()
		{
			return Location::all();
		}

		public function locationId($id)
		{
			return Location::find($id);
		}

		public function editLocation($id)
		{
			$location = $this->locationId($id);
			$location->location = request('location');
			$location->save();
		}

		//office
		public function createOffice($request)
		{
			Office::create([
				'office' => $request->office,
				'location_id' => $request->location
				]);
		}

		public function allOffices()
		{
			return Office::all();
		}

		public function officeId($id)
		{
			return Office::find($id);
		}

		public function offEdit($id)
		{
			$office = $this->officeId($id);
			$office->office = request('office');
			$office->location_id = request('location');
			$office->save();
		}

	}
