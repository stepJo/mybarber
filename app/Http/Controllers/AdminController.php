<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::first();

        return view('admin.configs.index', compact('admin'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $this->validate($request, [
            'admin_name' => 'required',
            'admin_email' => 'required',
            'admin_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'admin_name.required' => 'Admin Name is required!',
            'admin_email.required' => 'Admin Email is required!',
            'admin_image.image' => 'This file is not an image!'
        ]);

        $admin->admin_name = $request->admin_name;
        $admin->admin_email = $request->admin_email;

        if($request->has('admin_image')) {
            $image = time().'.'.$request->admin_image->extension();

            $destination = public_path('assets/uploads');

            $request->admin_image->move($destination, $image);

            $admin->admin_image = $image;
        } 

        $admin->update();

        return redirect('admin/configs')->with('success', 'updated admin info');
    }


    public function change(Request $request, Admin $admin)
    {
        $this->validate($request, [
            'admin_pwd' => 'required|required_with:confirm_pwd|same:confirm_pwd',
            'confirm_pwd' => 'required'
        ],
        [
            'admin_pwd.required' => 'Password is required!',
            'confirm_pwd.required' => 'Confirm Password is required!',
            'admin_pwd.same' => 'Password did not match!'
        ]);

        $admin->admin_pwd = Hash::make($request->admin_pwd);

        $admin->update();

        return redirect('admin/configs')->with('success', 'updated admin password');
    }
}
