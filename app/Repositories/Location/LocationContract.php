<?php 
	
	namespace App\Repositories\Location;

	interface LocationContract
	{	
		public function CreateLocation($request);
		public function allLocations();
		public function locationId($id);
		public function editLocation($id);
		public function createOffice($request);
		public function allOffices();
		public function officeId($id);
		public function offEdit($id);
	}