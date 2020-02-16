<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Service;
use App\ServiceHeader;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', compact('services'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'serv_name' => 'required|unique:services',
            'serv_desc' => 'required',
            'serv_image' => 'required|image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'serv_name.required' => 'Service Name is required!',
            'serv_name.unique' => 'Service Name already exist!',
            'serv_desc.required' => 'Service Description is required!',
            'serv_image.required' => 'Service Image is required!',
            'serv_image.image' => 'This file is not an image!'
        ]);

        $image = time().'.'.$request->serv_image->extension();

        $destination = public_path('assets/uploads');

        $request->serv_image->move($destination, $image);

        $service = Service::create([
            'serv_name' => $request->serv_name,
            'serv_name_slug' => Str::slug($request->serv_name, '-'),
            'serv_desc' => $request->serv_desc,
            'serv_image' => $image
        ]);

        return redirect('admin/services')->with('success', 'added service');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'serv_name' => 'required|unique:services,serv_name,'.$service->serv_id.',serv_id',
            'serv_desc' => 'required',
            'serv_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'serv_name.required' => 'Service Name is required!',
            'serv_name.unique' => 'Service Name already exist!',
            'serv_desc.required' => 'Service Description is required!',
            'serv_image.image' => 'This file is not an image!'
        ]);

        $service->serv_name = $request->serv_name;
        $service->serv_name_slug = Str::slug($request->serv_name, '-');
        $service->serv_desc = $request->serv_desc;

        if($request->has('serv_image')) {
            $image = time().'.'.$request->serv_image->extension();

            $destination = public_path('assets/uploads');

            $request->serv_image->move($destination, $image);

            $service->serv_image = $image;
        }

        $service->update();

        return redirect('admin/services')->with('success', 'updated service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect('admin/services')->with('success', 'deleted service');
    }


    public function header() 
    {
        $service_headers = ServiceHeader::all();

        return view('admin.services.hd_index', compact('service_headers'));      
    }


    public function createHeader()
    {
        return view('admin.services.hd_add');
    }


    public function storeHeader(Request $request)
    {
        $this->validate($request, [
            'serv_hd_title' => 'required',
            'serv_hd_caption' => 'required',
            'serv_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'serv_hd_title.required' => 'Service Header Title is required!',
            'serv_hd_caption.required' => 'Service Header Caption is required!',
            'serv_hd_image.image' => 'This file is not an image!'
        ]);

        if($request->has('serv_hd_image')) {
            $image = time().'.'.$request->serv_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->serv_hd_image->move($destination, $image);
        }
        else {
            $image = 'default.jpg';
        }

        $service_header = ServiceHeader::create([
            'serv_hd_title' => $request->serv_hd_title,
            'serv_hd_caption' => $request->serv_hd_caption,
            'serv_hd_image' => $image
        ]);

        return redirect('admin/services/headers')->with('success', 'added service header');
    }


    public function editHeader(ServiceHeader $header)
    {
        return view('admin.services.hd_edit', compact('header'));
    }


    public function updateHeader(Request $request, ServiceHeader $header)
    {
        $this->validate($request, [
            'serv_hd_title' => 'required',
            'serv_hd_caption' => 'required',
            'serv_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'serv_hd_title.required' => 'Service Header Title is required!',
            'serv_hd_caption.required' => 'Service Header Caption is required!',
            'serv_hd_image.image' => 'This file is not an image!'
        ]);

        $header->serv_hd_title = $request->serv_hd_title;
        $header->serv_hd_caption = $request->serv_hd_caption;

        if($request->has('serv_hd_image')) {
            $image = time().'.'.$request->serv_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->serv_hd_image->move($destination, $image);

            $header->serv_hd_image = $image;
        }

        $header->update();

        return redirect('admin/services/headers')->with('success', 'updated service header');
    }


    public function destroyHeader(ServiceHeader $header)
    {
        $header->delete();

        return redirect('admin/services/headers')->with('success', 'deleted service header');
    }


    public function active(ServiceHeader $header)
    {
        $header->serv_hd_active = 1;

        $header->update();

        DB::table('service_headers')->where('serv_hd_id', '!=', $header->serv_hd_id)->update(['serv_hd_active' => 0]);

        return redirect('admin/services/headers')->with('success', 'used service header preset');

    }
}
