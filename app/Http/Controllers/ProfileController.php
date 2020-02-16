<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() 
    {
    	$profile = Profile::first();

    	return view('admin.profiles.index', compact('profile'));
    }


    public function update(Request $request, Profile $profile)
    {
        if($request->profile_phone != '') {
    		$profile->profile_phone = $request->profile_phone;
    	}
        
        if($request->profile_email != '') {
    		$profile->profile_email = $request->profile_email;
    	}

        if($request->profile_fb != '') {
    		$profile->profile_fb = $request->profile_fb;
    	}

    	if($request->profile_ig != '') {
    		$profile->profile_ig = $request->profile_ig;
    	}

    	if($request->profile_twitter != '') {
    		$profile->profile_twitter = $request->profile_twitter;
    	}

		$profile->update();

		return redirect('admin/profiles')->with('success', 'updated profile');
    }
}
