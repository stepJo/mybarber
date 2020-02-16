<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Gallery;
use App\GalleryHeader;
use App\GalleryTag;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();

        return view('admin.galleries.index', compact('galleries'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$gallery_tags = GalleryTag::all();

        return view('admin.galleries.add', compact('gallery_tags'));
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
            'gal_tag' => 'required',
            'gal_title' => 'required',
            'gal_image' => 'required|image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'gal_tag.required' => 'Gallery Tag is required!',
            'gal_title.required' => 'Gallery Title is required!',
            'gal_image.required' => 'Gallery Image is required!',
            'gal_image.image' => 'This file is not an image!'
        ]);

        if($request->has('gal_image')) {
        	$image = time().'.'.$request->gal_image->extension();

	        $destination = public_path('assets/uploads');

	        $request->gal_image->move($destination, $image);
        }
        else {
        	$image = 'default.jpg';
        }

        $gallery = Gallery::create([
            'gal_tag_id' => $request->gal_tag,
            'gal_title' => $request->gal_title,
            'gal_image' => $image
        ]);

        return redirect('admin/galleries')->with('success', 'added gallery');
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
    public function edit(Gallery $gallery)
    {
    	$gallery_tags = GalleryTag::all();

        return view('admin.galleries.edit', compact('gallery', 'gallery_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'gal_tag' => 'required',
            'gal_title' => 'required|unique:galleries,gal_title,'.$gallery->gal_id.',gal_id',
            'gal_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'gal_tag.required' => 'Gallery Tag is required!',
            'gal_title.required' => 'Gallery Title is required!',
            'gal_image.image' => 'This file is not an image!'
        ]);

        $gallery->gal_tag_id = $request->gal_tag;
        $gallery->gal_title = $request->gal_title;

        if($request->has('gal_image')) {
            $image = time().'.'.$request->gal_image->extension();

            $destination = public_path('assets/uploads');

            $request->gal_image->move($destination, $image);

            $testimonial->gal_image = $image;
        } 

        $gallery->update();

        return redirect('admin/galleries')->with('success', 'updated gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect('admin/galleries')->with('success', 'deleted gallery');
    }


    public function header() 
    {
        $gallery_headers = GalleryHeader::all();

        return view('admin.galleries.hd_index', compact('gallery_headers'));      
    }


    public function createHeader()
    {
        return view('admin.galleries.hd_add');
    }


    public function storeHeader(Request $request)
    {
        $this->validate($request, [
            'gal_hd_title' => 'required',
            'gal_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'gal_hd_title.required' => 'Gallery Header Title is required!',
            'gal_hd_image.image' => 'This file is not an image!'
        ]);

        if($request->has('gal_hd_image')) {
            $image = time().'.'.$request->gal_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->gal_hd_image->move($destination, $image);
        }
        else {
            $image = 'default.jpg';
        }

        $gallery_header = GalleryHeader::create([
            'gal_hd_title' => $request->gal_hd_title,
            'gal_hd_image' => $image
        ]);

        return redirect('admin/galleries/headers')->with('success', 'added gallery header');
    }


    public function editHeader(GalleryHeader $header)
    {
        return view('admin.galleries.hd_edit', compact('header'));
    }


    public function updateHeader(Request $request, GalleryHeader $header)
    {
        $this->validate($request, [
            'gal_hd_title' => 'required',
            'gal_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'gal_hd_title.required' => 'Gallery Header Title is required!',
            'gal_hd_image.image' => 'This file is not an image!'
        ]);

        $header->gal_hd_title = $request->gal_hd_title;

        if($request->has('gal_hd_image')) {
            $image = time().'.'.$request->gal_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->gal_hd_image->move($destination, $image);

            $header->gal_hd_image = $image;
        }

        $header->update();

        return redirect('admin/galleries/headers')->with('success', 'updated gallery header');
    }


    public function destroyHeader(GalleryHeader $header)
    {
        $header->delete();

        return redirect('admin/galleries/headers')->with('success', 'deleted gallery header');
    }


    public function active(GalleryHeader $header)
    {
        $header->gal_hd_active = 1;

        $header->update();

        DB::table('gallery_headers')->where('gal_hd_id', '!=', $header->gal_hd_id)->update(['gal_hd_active' => 0]);

        return redirect('admin/galleries/headers')->with('success', 'used gallery header preset');

    }

    public function tags()
    {
        $gallery_tags = GalleryTag::all();

        return view('admin.galleries.tag_index', compact('gallery_tags'));        
    }


    public function createTag()
    {
        return view('admin.galleries.tag_add');
    }


    public function storeTag(Request $request)
    {
        $this->validate($request, [
            'gal_tag_name' => 'required'
        ],
        [
            'gal_tag_name.required' => 'Gallery Tag Name is required!',
        ]);

        $gallery_tag = GalleryTag::create([
            'gal_tag_name' => $request->gal_tag_name,
        ]);

        return redirect('admin/galleries/tags')->with('success', 'added gallery tag');
    }


    public function editTag(GalleryTag $tag)
    {
        return view('admin.galleries.tag_edit', compact('tag'));
    }


    public function updateTag(Request $request, GalleryTag $tag)
    {
        $this->validate($request, [
            'gal_tag_name' => 'required|unique:gallery_tags,gal_tag_name,'.$tag->gal_tag_id.',gal_tag_id',

        ],
        [
            'gal_tag_name.required' => 'Gallery Tag Name is required!',
            'gal_tag_name.unique' => 'Gallery Tag Name already Exist!',
        ]);

        $tag->gal_tag_name = $request->gal_tag_name;

        $tag->update();

        return redirect('admin/galleries/tags')->with('success', 'updated gallery tag');
    }


    public function destroyTag(GalleryTag $tag)
    {
        $tag->delete();

        $tag->galleries()->delete();

        return redirect('admin/galleries/tags')->with('success', 'deleted gallery tag');
    }
}
