<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();

        return view('admin.abouts.index', compact('abouts'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abouts.add');
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
            'ab_title' => 'required|unique:abouts',
            'ab_caption' => 'required',
            'ab_desc' => 'required',
            'ab_image' => 'required|image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'ab_title.required' => 'About Title is required!',
            'ab_title.unique' => 'About Title already exist!',
            'ab_caption.required' => 'About Caption is required!',
            'ab_desc.required' => 'About Description is required!',
            'ab_image.required' => 'About Image is required!',
            'ab_image.image' => 'This file is not an image!'
        ]);

        $image = time().'.'.$request->ab_image->extension();

        $destination = public_path('assets/uploads');

        $request->ab_image->move($destination, $image);

        $about = About::create([
            'ab_title' => $request->ab_title,
            'ab_caption' => $request->ab_caption,
            'ab_desc' => $request->ab_desc,
            'ab_image' => $image,
            'ab_active' => 0
        ]);

        return redirect('admin/abouts')->with('success', 'added about preset');
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
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $this->validate($request, [
            'ab_title' => 'required|unique:abouts,ab_title,'.$about->ab_id.',ab_id',
            'ab_caption' => 'required',
            'ab_desc' => 'required',
            'ab_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'ab_title.required' => 'About Title is required!',
            'ab_title.unique' => 'About Title already exist!',
            'ab_caption.required' => 'About Caption is required!',
            'ab_desc.required' => 'About Description is required!',
            'ab_image.required' => 'About Image is required!',
            'ab_image.image' => 'This file is not an image!'
        ]);

        $about->ab_title = $request->ab_title;
        $about->ab_caption = $request->ab_caption;
        $about->ab_desc = $request->ab_desc;

        if($request->has('ab_image')) {
            $image = time().'.'.$request->serv_image->extension();

            $destination = public_path('assets/uploads');

            $request->ab_image->move($destination, $image);

            $about->ab_image = $image;
        } 

        $about->update();

        return redirect('admin/abouts')->with('success', 'updated about preset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->delete();

        return redirect('admin/abouts')->with('success', 'deleted about preset');
    }


    public function active(About $about)
    {
        $about->ab_active = 1;

        $about->update();

        DB::table('abouts')->where('ab_id', '!=', $about->ab_id)->update(['ab_active' => 0]);

        return redirect('admin/abouts')->with('success', 'used about preset');

    }
}
