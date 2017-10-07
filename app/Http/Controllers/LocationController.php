<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Asset\AssetContract;


class LocationController extends Controller
{
          protected $repo;

      function __construct(AssetContract $assetData)
      {
         $this->repo = $assetData;
      }

      public function location()
      {
            $locations = $this->repo->allLocations();
            $location = 0;
            $edit = 0 ;
            return view('createLocation', compact('locations', 'edit', 'location'));
      }

      public function saveLocation(Request $request)
      {
            $this->validate($request,[
      	'location' => 'required'
            ]);
            $check = $this->repo->createLocation($request);
            if ($check) {
      	session()->flash('message', 'Location has been successfully created. ');
      	return redirect()->route('location');
            }else{
      	return back()->withErrors(['message' => 'Location alredy exit']);
            }   	
      }

      public function deleteLocation($id)
      {
            $location = $this->repo->locationId($id);
            $location->delete();
            session()->flash('message', 'Location has been successfully deleted. ');
            return redirect()->route('location');
      }

      public function getEdit($id)
      {	
            $locations = $this->repo->allLocations();
            $location = $this->repo->locationId($id);
            $edit = 1;
            return view('createLocation', compact('locations', 'location', 'edit'));
      }

      public function edit($id)
      {
            $this->validate(request(),[
      	     'location'=>'required'
                  ]);
            $this->repo->editLocation($id);
            session()->flash('message', 'Location has been successfully updated. ');
            return redirect()->route('location');
      }

      public function viewLocation($id)
      {
            $location = $this->repo->locationId($id);
            return view('viewLocation', compact('location'));
      }

      //office
      public function office()
      { 
            $locations = $this->repo->allLocations();
            $offices = $this->repo->allOffices();
            $office = 0;
            $edit = 0;
           return view('addOffice', compact('locations', 'offices', 'office', 'edit'));
      }

      public function saveOffice(Request $request)
      {
            $this->validate($request,[
      	     'office' => 'required',
      	     'location' => 'required'
                  ]);
            $this->repo->createOffice($request); 
      	session()->flash('message', 'Office has been successfully added.');
      	return redirect()->route('office');
      }

      public function getEditOff($id)
      {
            $locations = $this->repo->allLocations();
            $offices = $this->repo->allOffices();
            $office = $this->repo->officeId($id);
            $edit = 1;
            return view('addOffice', compact('locations', 'offices', 'office', 'edit'));
      }

      public function editOffice($id)
      {
            $this->validate(request(),[
                        'office' => 'required',
                        'location' => 'required'
                  ]);
            $this->repo->offEdit($id);
            session()->flash('message', 'Office has been successfully updated');
            return redirect()->route('office');
      }

      public function deleteOffice($id)
      {
            $office = $this->repo->officeId($id);
            $office->delete();
            session()->flash('message', 'Office has been successfully delete');
            return redirect()->route('office');
      }

      public function viewOffice($id)
      {
            $office = $this->repo->officeId($id);
            return view('viewOffice', compact('office'));
      }
}
