<?php

namespace App\Http\Controllers;

use App\Repositories\Asset\AssetContract;
use Illuminate\Http\Request;
Use App\Office;
use App\Location;
use App\Asset;

class IssueController extends Controller
{
    protected $repo;

    function __construct(AssetContract $assetData)
    {
       $this->repo = $assetData;
    }
    
    public function getIssue()
    {
        $search = 0;
        return view('issue', compact('search'));
    }

    public function search()
    {
        if(isset($_GET['search'])){
            $search = Asset::where('number' , '=' ,$_GET['search'] )->first();
            if (count($search)) {
                return view('issue', compact('search'));
            }else{
                  return back()->withErrors([
                       'message' => 'Please check the number and try againe'
                ]);         
            }              
        }    
    }

    public function report(Request $request){
        $this->validate($request,[
                'asset' => 'required',
                'description' => 'required'
            ]);
        $check = $this->repo->reportIssue($request);
        if ($check == false) {
             return back()->withErrors([
                       'message' => 'Issue as alredy been reported by another user'
                ]);        
        }else{
                session()->flash('message', 'Issue has been successfully created. But still pending.');
                return back();
        }  
    }

    public function getAssign()
    {
        $pendings = $this->repo->pendingIssues();
        $supports = $this->repo->allSupport();
        foreach ($supports as $support) {
             $supportUsers = $support->users ;    
        }
        return view('assignUsers', compact('pendings', 'supportUsers'));
    }

    public function assign()
    {
        dd(request()->all());
        session()->flash('message', 'suports has been assign');
        return back();
    }


}
