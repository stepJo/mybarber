<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.sliders.index', compact('sliders'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.add');
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
            'slider_title' => 'required',
            'slider_caption' => 'required',
            'slider_image' => 'required|image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'slider_title.required' => 'Slider Title is required!',
            'slider_caption.required' => 'Slider caption is required!',
            'slider_image.image' => 'This file is not an image!'
        ]);

        $image = time().'.'.$request->slider_image->extension();

        $destination = public_path('assets/uploads');

        $request->slider_image->move($destination, $image);

        $slider = Slider::create([
            'slider_title' => $request->slider_title,
            'slider_caption' => $request->slider_caption,
            'slider_image' => $image
        ]);

        return redirect('admin/sliders')->with('success', 'added slider');
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
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'slider_title' => 'required',
            'slider_caption' => 'required',
            'slider_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'slider_title.required' => 'Slider Title is required!',
            'slider_caption.required' => 'Slider caption is required!',
            'slider_image.image' => 'This file is not an image!'
        ]);

        $slider->slider_title = $request->slider_title;
        $slider->slider_caption = $request->slider_caption;

        if($request->has('slider_image')) {
            $image = time().'.'.$request->slider_image->extension();

            $destination = public_path('assets/uploads');

            $request->slider_image->move($destination, $image);

            $slider->slider_image = $image;
        }

        $slider->update();

        return redirect('admin/sliders')->with('success', 'updated slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect('admin/sliders')->with('success', 'deleted slider');
    }
}
