<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
      public function getLogin()
      {
      	return view('login');
      }

      public function login(Request $request)
	{      
		if (! auth()->attempt(request(['username']))){
	            return back()->withErrors([
	                  'message' => 'Please check your credentials and try agine'
	            ]);
	      }else{
	        	return redirect()->route('index');
	      }
	}

	
}
