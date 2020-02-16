<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogHeader;
use App\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('admin.blogs.index', compact('blogs'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = BlogCategory::all();

        if(count($blog_categories) == 0) {
            return redirect('admin/blogs')->with('warning', 'add blog category first');
        }

        return view('admin.blogs.add', compact('blog_categories'));
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
            'blog_category' => 'required',
            'blog_title' => 'required|unique:blogs',
            'blog_content' => 'required',
            'blog_author' => 'required', 
            'blog_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'blog_category.required' => 'Blog Category is required!',
            'blog_title.required' => 'Blog Title is required!',
            'blog_title.unique' => 'Blog Title already exist!',
            'blog_content.required' => 'Blog Content is required!',
            'blog_author.required'=> 'Blog Author is required!',
            'blog_image.image' => 'This file is not an image!'
        ]);

        if($request->has('blog_image')) {
            $image = time().'.'.$request->blog_image->extension();

            $destination = public_path('assets/uploads');

            $request->blog_image->move($destination, $image);
        }
        else {
            $image = 'default.jpg';
        }

        $blog = Blog::create([
            'blog_cat_id' => $request->blog_category,
            'blog_title' => $request->blog_title,
            'blog_title_slug' => Str::slug($request->blog_title, '-'),
            'blog_content' => $request->blog_content,
            'blog_author' => $request->blog_author,
            'blog_image' => $image,
            'blog_post_date' => date("Y-m-d H:i:s")  
        ]);

        return redirect('admin/blogs')->with('success', 'added blog');
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
    public function edit(Blog $blog)
    {

        $blog_categories = BlogCategory::all();

        return view('admin.blogs.edit', compact('blog', 'blog_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'blog_category' => 'required',
            'blog_title' => 'required|unique:blogs,blog_title,'.$blog->blog_id.',blog_id',
            'blog_content' => 'required',
            'blog_author' => 'required',
            'blog_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'blog_category.required' => 'Blog Category is required!',
            'blog_title.required' => 'Blog Title is required!',
            'blog_title.unique' => 'Blog Title already exist!',
            'blog_content.required' => 'Blog Content is required!',
            'blog_author.required'=> 'Blog Author is required!',
            'blog_image.image' => 'This file is not an image!'
        ]);

        $blog->blog_cat_id = $request->blog_category;
        $blog->blog_title = $request->blog_title;
        $blog->blog_title_slug = Str::slug($request->blog_title, '-');
        $blog->blog_content = $request->blog_content;
        $blog->blog_author = $request->blog_author;

        if($request->has('blog_image')) {
            $image = time().'.'.$request->blog_image->extension();

            $destination = public_path('assets/uploads');

            $request->blog_image->move($destination, $image);

            $blog->blog_image = $image;
        } 

        $blog->update();

        return redirect('admin/blogs')->with('success', 'updated blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect('admin/blogs')->with('success', 'deleted blog');
    }


    public function header() 
    {
        $blog_headers = BlogHeader::all();

        return view('admin.blogs.hd_index', compact('blog_headers'));      
    }


    public function createHeader()
    {
        return view('admin.blogs.hd_add');
    }


    public function storeHeader(Request $request)
    {
        $this->validate($request, [
            'blog_hd_title' => 'required',
            'blog_hd_caption' => 'required',
            'blog_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'blog_hd_title.required' => 'Blog Header Title is required!',
            'blog_hd_caption.required' => 'Blog Header Caption is required!',
            'blog_hd_image.image' => 'This file is not an image!'
        ]);

        if($request->has('blog_hd_image')) {
            $image = time().'.'.$request->blog_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->blog_hd_image->move($destination, $image);
        }
        else {
            $image = 'default.jpg';
        }

        $blog_header = BlogHeader::create([
            'blog_hd_title' => $request->blog_hd_title,
            'blog_hd_caption' => $request->blog_hd_caption,
            'blog_hd_image' => $image
        ]);

        return redirect('admin/blogs/headers')->with('success', 'added blog header');
    }


    public function editHeader(BlogHeader $header)
    {
        return view('admin.blogs.hd_edit', compact('header'));
    }


    public function updateHeader(Request $request, BlogHeader $header)
    {
        $this->validate($request, [
            'blog_hd_title' => 'required',
            'blog_hd_caption' => 'required',
            'blog_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'blog_hd_title.required' => 'Blog Header Title is required!',
            'blog_hd_caption.required' => 'Blog Header Caption is required!',
            'blog_hd_image.image' => 'This is not an image!'
        ]);

        if($request->has('blog_hd_image')) {
            $image = time().'.'.$request->blog_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->blog_hd_image->move($destination, $image);

            $header->blog_hd_image = $image;
        }

        $header->blog_hd_title = $request->blog_hd_title;
        $header->blog_hd_caption = $request->blog_hd_caption;

        $header->update();

        return redirect('admin/blogs/headers')->with('success', 'updated blog header');
    }


    public function destroyHeader(BlogHeader $header)
    {
        $header->delete();

        return redirect('admin/blogs/headers')->with('success', 'deleted blog header');
    }


    public function active(BlogHeader $header)
    {
        $header->blog_hd_active = 1;

        $header->update();

        DB::table('blog_headers')->where('blog_hd_id', '!=', $header->blog_hd_id)->update(['blog_hd_active' => 0]);

        return redirect('admin/blogs/headers')->with('success', 'used blog header preset');

    }


    public function categories()
    {
        $blog_categories = BlogCategory::all();

        return view('admin.blogs.category_index', compact('blog_categories'));        
    }


    public function createCategory()
    {
        return view('admin.blogs.category_add');
    }


    public function storeCategory(Request $request)
    {
        $this->validate($request, [
            'blog_cat_name' => 'required'
        ],
        [
            'blog_cat_name.required' => 'Blog Category Name is required!',
        ]);

        $blog_category = BlogCategory::create([
            'blog_cat_name' => $request->blog_cat_name,
        ]);

        return redirect('admin/blogs/categories')->with('success', 'added blog category');
    }


    public function editCategory(BlogCategory $category)
    {
        return view('admin.blogs.category_edit', compact('category'));
    }


    public function updateCategory(Request $request, BlogCategory $category)
    {
        $this->validate($request, [
            'blog_cat_name' => 'required|unique:blog_categories,blog_cat_name,'.$category->blog_cat_id.',blog_cat_id',

        ],
        [
            'blog_cat_name.required' => 'Blog Category Name is required!',
            'blog_cat_name.unique' => 'Blog Category Name already Exist!',
        ]);

        $category->blog_cat_name = $request->blog_cat_name;

        $category->update();

        return redirect('admin/blogs/categories')->with('success', 'updated blog category');
    }


    public function destroyCategory(BlogCategory $category)
    {
        $category->delete();

        $category->blogs()->delete();

        return redirect('admin/blogs/categories')->with('success', 'deleted blog category');
    }
}
