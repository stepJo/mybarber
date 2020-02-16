<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductHeader;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add');
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
            'prd_name' => 'required|unique:products',
            'prd_price' => 'required|numeric',
            'prd_image' => 'required|image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'prd_name.required' => 'Product Name is required!',
            'prd_name.unique' => 'Product Name already exist!',
            'prd_price.required' => 'Product Price is required!',
            'prd_price.numeric' => 'Product Price must be numeric!',
            'prd_image.required' => 'Product Image is required!',
            'prd_image.image' => 'This file is not an image!'
        ]);

        $image = time().'.'.$request->prd_image->extension();

        $destination = public_path('assets/uploads');

        $request->prd_image->move($destination, $image);

        $product = Product::create([
            'prd_name' => $request->prd_name,
            'prd_name_slug' => Str::slug($request->prd_name, '-'),
            'prd_price' => $request->prd_price,
            'prd_image' => $image
        ]);

        return redirect('admin/products')->with('success', 'added product');
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
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'prd_name' => 'required|unique:products,prd_name,'.$product->prd_id.',prd_id',
            'prd_price' => 'required|numeric',
            'prd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'prd_name.required' => 'Product Name is required!',
            'prd_name.unique' => 'Product Name already exist!',
            'prd_price.required' => 'Product Price is required!',
            'prd_price.numeric' => 'Product Price must be numeric!',
            'prd_image.image' => 'This file is not an image!'
        ]);

        $product->prd_name = $request->prd_name;
        $product->prd_name_slug = Str::slug($request->prd_name, '-');
        $product->prd_price = $request->prd_price;

        if($request->has('prd_image')) {
            $image = time().'.'.$request->prd_image->extension();

            $destination = public_path('assets/uploads');

            $request->prd_image->move($destination, $image);

            $product->prd_image = $image;
        }

        $product->update();

        return redirect('admin/products')->with('success', 'updated product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('admin/products')->with('success', 'deleted product');
    }


    public function header() 
    {
        $product_headers = ProductHeader::all();

        return view('admin.products.hd_index', compact('product_headers'));      
    }


    public function createHeader()
    {
        return view('admin.products.hd_add');
    }

    public function storeHeader(Request $request)
    {
        $this->validate($request, [
            'prd_hd_title' => 'required',
            'prd_hd_caption' => 'required',
            'prd_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'prd_hd_title.required' => 'Product Header Title is required!',
            'prd_hd_caption.required' => 'Product Header Caption is required!',
            'prd_hd_image.image' => 'This file is not an image!'
        ]);

        if($request->has('prd_hd_image')) {
            $image = time().'.'.$request->prd_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->prd_hd_image->move($destination, $image);
        }
        else {
            $image = 'default.jpg';
        }

        $product_header = ProductHeader::create([
            'prd_hd_title' => $request->prd_hd_title,
            'prd_hd_caption' => $request->prd_hd_caption,
            'prd_hd_image' => $image
        ]);

        return redirect('admin/products/headers')->with('success', 'added product header');
    }


    public function editHeader(ProductHeader $header)
    {
        return view('admin.products.hd_edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateHeader(Request $request, ProductHeader $header)
    {
        $this->validate($request, [
            'prd_hd_title' => 'required',
            'prd_hd_caption' => 'required',
            'prd_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'prd_hd_title.required' => 'Product Header Title is required!',
            'prd_hd_caption.required' => 'Product Header Caption is required!',
            'prd_hd_image.image' => 'This file is not an image!'
        ]);

        $header->prd_hd_title = $request->prd_hd_title;
        $header->prd_hd_caption = $request->prd_hd_caption;

        if($request->has('prd_hd_image')) {
            $image = time().'.'.$request->prd_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->prd_hd_image->move($destination, $image);

            $header->prd_hd_image = $image;
        }

        $header->update();

        return redirect('admin/products/headers')->with('success', 'updated product header');
    }


    public function destroyHeader(ProductHeader $header)
    {
        $header->delete();

        return redirect('admin/products/headers')->with('success', 'deleted product header');
    }


    public function active(ProductHeader $header)
    {
        $header->prd_hd_active = 1;

        $header->update();

        DB::table('product_headers')->where('prd_hd_id', '!=', $header->prd_hd_id)->update(['prd_hd_active' => 0]);

        return redirect('admin/products/headers')->with('success', 'used product header preset');

    }
}
