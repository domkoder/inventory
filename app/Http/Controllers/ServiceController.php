<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Asset\AssetContract;

class ServiceController extends Controller
{
	
      protected $repo;

     function __construct(AssetContract $assetData)
     {
         $this->repo = $assetData;
     }

      //Returning the service view with a lot of variables for check. 
      public function service()
      {  
          $service= 0;
          $locations = $this->repo->allLocations();
          $services = $this->repo->allServices();
          $edit = 0;
          $offices = 0;
          return view('createService', compact('locations', 'services', 'edit', 'service', 'offices'));
      }

      //Saving a Particular  service .
      public function saveService(Request $request)
      {
         $this->validate($request,[
               'service' => 'required|min:2|max:100',
               'description' => 'required|min:3',
               'location' =>'required',
               'office' =>'required',
           ]);
         $this->repo->createService($request);
         session()->flash('message', 'Your Service has been successfully created. ');
         return back();
      }

      //Returning the editing form with a lot of variables for check.
      public function getEditService($id)
     {
            $service= $this->repo->serviceId($id);
            $locations = $this->repo->allLocations();
            $offices = $this->repo->allOffices();
            $services = $this->repo->allServices();
            $edit = 1;
            return view('createService', compact('locations', 'services', 'edit', 'service','offices'));
     }

     //Editing a Particular  service.
     public function edit($id)
     {
          $this->repo->editService($id);
          session()->flash('message', 'service has been successfully updated');
          return redirect()->route('services');
     }

     // public function viewService($id)
     // {
     //     $service = $this->repo->serviceId($id);
     //     return view('viewservice', compact('service'));
     // }

     // //Delete a Particular service.
     // public function deleteService($id)
     // {
     //    $service = $this->repo->serviceId($id);
     //    $service->delete();
     //    session()->flash('message', 'service has been successfully delete');
     //    return redirect()->route('index');
     // }
}
