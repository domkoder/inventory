<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Asset\AssetContract;
use App\Asset;

class AssetController extends Controller
{
	protected $repo;

	function __construct(AssetContract $assetData)
	{
	   $this->repo = $assetData;
	}

      //Returning the index view with a lot of variables for check. 
    	public function index()
    	{  
          $asset= 0;
          $locations = $this->repo->allLocations();
          $assets = $this->repo->allAssets();
          $edit = 0;
          $offices = 0;
    	    return view('index', compact('locations', 'assets', 'edit', 'asset', 'offices'));
    	}

      //Returning the html select element for all the office asotiated with a Particular  location. Uesing ajax request .
      public function getOffices($value)
      {
          $html = '';
          $offices = $this->repo->offices($value);
               $html .= '<select id="remove_select" name="office"  style="border-radius: 5px;">';
               $html .= '<option> Select office</option>';
               foreach ($offices as $office){
                  $html .= '<option value="'.$office->id.'"> '.$office->office.' </option>';
               }
              $html .= '</select>';
             return $html;
      }

      //Saving a Particular  asset .
    	public function saveAsset(Request $request)
    	{
    	   $this->validate($request,[
	       'asset' => 'required|min:2|max:100',
	       'description' => 'required|min:3',
	       'location' =>'required',
	       'office' =>'required',
	   ]);
    	   $this->repo->createAsset($request);
    	   session()->flash('message', 'Your Asset has now been created . ');
    	   return back();
    	}

      //Returning the editing form with a lot of variables for check.
      public function getEditAsset($id)
     {
            $asset= $this->repo->assetId($id);
            $locations = $this->repo->allLocations();
            $offices = $this->repo->allOffices();
            $assets = $this->repo->allAssets();
            $edit = 1;
            return view('index', compact('locations', 'assets', 'edit', 'asset','offices'));
     }

     //Editing a Particular  asset.
     public function edit($id)
     {
          $this->repo->editAsset($id);
          session()->flash('message', 'Asset has been successfully updated');
          return redirect()->route('index');
     }

     public function viewAsset($id)
     {
         $asset = $this->repo->assetId($id);
         return view('viewAsset', compact('asset'));
     }

     //Delete a Particular asset.
     public function deleteAsset($id)
     {
        $asset = $this->repo->assetId($id);
        $asset->delete();
        session()->flash('message', 'Asset has been successfully delete');
        return redirect()->route('index');
     }
}
