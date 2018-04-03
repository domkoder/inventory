<?php

	namespace App\Repositories\Asset;

	use App\Repositories\Asset\AssetContract;
	use App\Asset;
	use App\Location;
	use App\Service;
	use App\Office;
	use App\Issue;
	use App\User;
	use Auth;
	use App\Role;

	/**
	* 
	*/
	class EloquentAssetRepository implements AssetContract
	{
		//Asset	
		public function createAsset($request)
		{
    			$user_id = $this->authUser();
    				$count=0;
				$digits_needed=8;
				$random_number='';
				while ( $count < 8 ){
	    			$random_digit = mt_rand(0, 9);
	    			$random_number .= $random_digit;
	    			$count++;
	    			}
			Asset::create([		
				'asset' => $request->asset,
				'description' => $request->description,
				'location_id' => $request->location,
				'office_id' => $request->office,
				'number' =>$random_number,
				'user_id' =>$user_id
			]);
		}

		public function editService($id)
		{
			$service = $this->serviceId($id);
			$service->service = request('service');
			$service->description = request('description');
			$service->location_id = request('location');
			$service->office_id = request('office');
			$service->save();
		}

		public function offices($value)
		{
			return Office::where('location_id', '=', $value)->get();
		}

		public function allAssets()
		{
			return Asset::all();
		}

		public function assetId($id)
		{
			return Asset::find($id);
		}

		//Service
		public function createService($request)
		{
    			$user_id = $this->authUser();
			Service::create([		
				'service' => $request->service,
				'description' => $request->description,
				'location_id' => $request->location,
				'office_id' => $request->office,
				'user_id' =>$user_id
			]);
		}

		public function editAsset($id)
		{
			$asset = $this->assetId($id);
			$asset->asset = request('asset');
			$asset->description = request('description');
			$asset->location_id = request('location');
			$asset->office_id = request('office');
			$asset->save();
		}

		public function allServices()
		{
			return Service::all();
		}

		public function serviceId($id)
		{
			return Service::find($id);
		}			


		//Location
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

		//issue
		public function reportIssue($request)
		{
			$user_id = $this->authUser();
			$check= Issue::where('asset_id', $request->asset)->first();
			if ($check) {
			return false;
			}	
				Issue::create([
				'asset_id'=> $request->asset,
				'status' => 'pending',
				'description' => $request->description,
				'user_id' => $user_id
				]);
				return true;
		}

		public function allIssues()
		{
			return Issue::all();
		}

		public function pendingIssues()
		{
			return Issue::where('status', 'pending')->get();
		}

		//users
		public function authUser()
		{
			return Auth::user()->id;
		}

		public function register($request)
		{
			return User::create([
		            'userName' => $request->userName,
		            'password' => bcrypt($request->password) 
		        	]);
		}

		public function userAsset($authUser)
		{
			return Asset::where('user_id', $authUser)->get();
		}

		public function allSupport()
		{
			return Role::with('users')->where('name', 'support')->get();
		}

	}
