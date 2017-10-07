<?php 
	
	namespace App\Repositories\Asset;

	interface AssetContract
	{	
		//Asset
		public function createAsset($request);
		public function editAsset($id);
		public function offices($value);
		public function allAssets();
		public function assetId($id);

		//Service
		public function createService($request);
		public function editService($id);
		public function allServices();
		public function serviceId($id);

		//issue
		public function reportIssue($request);
		public function allIssues();
		public function pendingIssues();
		
		//Location
		public function CreateLocation($request);
		public function allLocations();
		public function locationId($id);
		public function editLocation($id);

		//office
		public function createOffice($request);
		public function allOffices();
		public function officeId($id);
		public function offEdit($id);

		//users
		public function register($request);
		public function authUser();
		public function userAsset($authUser);
		public function allSupport(); 
	}