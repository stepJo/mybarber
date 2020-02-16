<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {	
    	$setting = Setting::first();

    	return view('admin.settings.index', compact('setting'));
    }


    public function update(Request $request, Setting $site)
    {
        if($request->set_web_title != '') {
            $site->set_web_title = $request->set_web_title;
        }
        
        if($request->has('set_web_logo')) {
            $image = time().'.'.$request->set_web_logo->extension();

            $destination = public_path('assets/uploads');

            $request->set_web_logo->move($destination, $image);

            $site->set_web_logo = $image;
        } 

        $site->update();

        return redirect('admin/sites')->with('success', 'updated site');
    }


    public function meta(Request $request, Setting $site)
    {
        if($request->set_m_author != '') {
            $site->set_m_author = $request->set_m_author;
        }

        if($request->set_m_desc != '') {
            $site->set_m_desc = $request->set_m_desc;
        }
     	
        if($request->set_m_keyword != '') {
            $site->set_m_keyword = $request->set_m_keyword;
        }

        $site->update();

        return redirect('admin/sites')->with('success', 'updated meta tags');
    }
}
