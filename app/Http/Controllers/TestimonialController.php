<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Testimonial;
use App\TestimonialHeader;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonials.index', compact('testimonials'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.add');
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
            'test_name' => 'required',
            'test_caption' => 'required',
            'test_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'test_name.required' => 'Testimonial Name is required!',
            'test_caption.required' => 'Testimonial Caption is required!',
            'test_image.image' => 'This file is not an image!'
        ]);

        if($request->has('test_image')) {
        	$image = time().'.'.$request->test_image->extension();

	        $destination = public_path('assets/uploads');

	        $request->test_image->move($destination, $image);
        }
        else {
        	$image = 'default.jpg';
        }

        $testimonial = Testimonial::create([
            'test_name' => $request->test_name,
            'test_caption' => $request->test_caption,
            'test_image' => $image
        ]);

        return redirect('admin/testimonials')->with('success', 'added testimonial');
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
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'test_name' => 'required',
            'test_caption' => 'required',
            'test_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'test_name.required' => 'Testimonial Name is required!',
            'test_caption.required' => 'Testimonial Caption is required!',
            'test_image.image' => 'This file is not an image!'
        ]);

        $testimonial->test_name = $request->test_name;
        $testimonial->test_caption = $request->test_caption;

        if($request->has('test_image')) {
            $image = time().'.'.$request->test_image->extension();

            $destination = public_path('assets/uploads');

            $request->test_image->move($destination, $image);

            $testimonial->test_image = $image;
        } 

        $testimonial->update();

        return redirect('admin/testimonials')->with('success', 'updated testimonial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect('admin/testimonials')->with('success', 'deleted testimonial');
    }


    public function header() 
    {
        $testimonial_headers = TestimonialHeader::all();

        return view('admin.testimonials.hd_index', compact('testimonial_headers'));      
    }


    public function createHeader()
    {
        return view('admin.testimonials.hd_add');
    }


    public function storeHeader(Request $request)
    {
        $this->validate($request, [
            'test_hd_title' => 'required',
            'test_hd_caption' => 'required',
            'test_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'test_hd_title.required' => 'Testimonial Header Title is required!',
            'test_hd_caption.required' => 'Testimonial Header Caption is required!',
            'test_hd_image.image' => 'This file is not an image!'
        ]);

        if($request->has('test_hd_image')) {
            $image = time().'.'.$request->test_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->test_hd_image->move($destination, $image);
        }
        else {
            $image = 'default.jpg';
        }

        $testimonial_header = TestimonialHeader::create([
            'test_hd_title' => $request->test_hd_title,
            'test_hd_caption' => $request->test_hd_caption,
            'test_hd_image' => $image
        ]);

        return redirect('admin/testimonials/headers')->with('success', 'added testimonial header');
    }


    public function editHeader(TestimonialHeader $header)
    {
        return view('admin.testimonials.hd_edit', compact('header'));
    }


    public function updateHeader(Request $request, TestimonialHeader $header)
    {
        $this->validate($request, [
            'test_hd_title' => 'required',
            'test_hd_caption' => 'required',
            'test_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'test_hd_title.required' => 'Testimonial Header Title is required!',
            'test_hd_caption.required' => 'Testimonial Header Caption is required!',
            'test_hd_image.image' => 'This file is not an image!'
        ]);

        $header->test_hd_title = $request->test_hd_title;
        $header->test_hd_caption = $request->test_hd_caption;

        if($request->has('test_hd_image')) {
            $image = time().'.'.$request->test_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->test_hd_image->move($destination, $image);

            $header->test_hd_image = $image;
        }

        $header->update();

        return redirect('admin/testimonials/headers')->with('success', 'updated testimonial header');
    }


    public function destroyHeader(TestimonialHeader $header)
    {
        $header->delete();

        return redirect('admin/testimonials/headers')->with('success', 'deleted testimonial header');
    }


    public function active(TestimonialHeader $header)
    {
        $header->test_hd_active = 1;

        $header->update();

        DB::table('testimonial_headers')->where('test_hd_id', '!=', $header->test_hd_id)->update(['test_hd_active' => 0]);

        return redirect('admin/testimonials/headers')->with('success', 'used testimonial header preset');

    }
}
