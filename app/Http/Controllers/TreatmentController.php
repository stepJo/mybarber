<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Treatment;
use App\TreatmentHeader;
use App\TreatmentType;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treatments = Treatment::all();

        return view('admin.treatments.index', compact('treatments'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $treatment_types = TreatmentType::all();

        if(count($treatment_types) == 0) {
            return redirect('admin/treatments')->with('warning', 'add treatment type first');
        }

        return view('admin.treatments.add', compact('treatment_types'));
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
            'treat_type' => 'required',
            'treat_name' => 'required|unique:treatments',
            'treat_desc' => 'required',
            'treat_price' => 'required|numeric',
            'treat_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'treat_type.required' => 'Treatment Type is required!',
            'treat_name.required' => 'Treatment Name is required!',
            'treat_name.unique' => 'Treatment Name already exist!',
            'treat_desc.required' => 'Treatment Description is required!',
            'treat_price.required'=> 'Treatment Price is required!',
            'treat_price.numeric' => 'Treatment Price must be numeric!',
            'treat_image.image' => 'This file is not an image!'
        ]);

        if($request->has('treat_image')) {
        	$image = time().'.'.$request->treat_image->extension();

	        $destination = public_path('assets/uploads');

	        $request->treat_image->move($destination, $image);
        }
        else {
        	$image = 'default.jpg';
        }

        $treatment = Treatment::create([
            'treat_type_id' => $request->treat_type,
            'treat_name' => $request->treat_name,
            'treat_name_slug' => Str::slug($request->treat_name, '-'),
            'treat_desc' => $request->treat_desc,
            'treat_price' => $request->treat_price,
            'treat_image' => $image
        ]);

        return redirect('admin/treatments')->with('success', 'added treatment');
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
    public function edit(Treatment $treatment)
    {

        $treatment_types = TreatmentType::all();

        return view('admin.treatments.edit', compact('treatment', 'treatment_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treatment $treatment)
    {
        $this->validate($request, [
            'treat_type' => 'required',
            'treat_name' => 'required|unique:treatments,treat_name,'.$treatment->treat_id.',treat_id',
            'treat_desc' => 'required',
            'treat_price' => 'required|numeric',
            'treat_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'treat_type.required' => 'Treatment Type is required!',
            'treat_name.required' => 'Treatment Name is required!',
            'treat_name.unique' => 'Treatment Name already exist!',
            'treat_desc.required' => 'Treatment Description is required!',
            'treat_price.required'=> 'Treatment Price is required!',
            'treat_price.numeric' => 'Treatment Price must be numeric!',
            'treat_image.image' => 'This file is not an image!'
        ]);

        $treatment->treat_type_id = $request->treat_type;
        $treatment->treat_name = $request->treat_name;
        $treatment->treat_name_slug = Str::slug($request->treat_name, '-');
        $treatment->treat_desc = $request->treat_desc;
        $treatment->treat_price = $request->treat_price;

        if($request->has('treat_image')) {
            $image = time().'.'.$request->treat_image->extension();

            $destination = public_path('assets/uploads');

            $request->treat_image->move($destination, $image);

            $treatment->treat_image = $image;
        } 

        $treatment->update();

        return redirect('admin/treatments')->with('success', 'updated treatment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        $treatment->delete();

        return redirect('admin/treatments')->with('success', 'deleted treatment');
    }


    public function header() 
    {
        $treatment_headers = TreatmentHeader::all();

        return view('admin.treatments.hd_index', compact('treatment_headers'));      
    }


    public function createHeader()
    {
        return view('admin.treatments.hd_add');
    }


    public function storeHeader(Request $request)
    {
        $this->validate($request, [
            'treat_hd_title' => 'required',
            'treat_hd_caption' => 'required',
            'treat_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'treat_hd_title.required' => 'Treatment Header Title is required!',
            'treat_hd_caption.required' => 'Treatment Header Caption is required!',
            'treat_hd_image.image' => 'This file is not an image!'
        ]);

        if($request->has('treat_hd_image')) {
            $image = time().'.'.$request->treat_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->treat_hd_image->move($destination, $image);
        }
        else {
            $image = 'default.jpg';
        }

        $treatment_header = TreatmentHeader::create([
            'treat_hd_title' => $request->treat_hd_title,
            'treat_hd_caption' => $request->treat_hd_caption,
            'treat_hd_image' => $image
        ]);

        return redirect('admin/treatments/headers')->with('success', 'added treatment header');
    }


    public function editHeader(TreatmentHeader $header)
    {
        return view('admin.treatments.hd_edit', compact('header'));
    }


    public function updateHeader(Request $request, TreatmentHeader $header)
    {
        $this->validate($request, [
            'treat_hd_title' => 'required',
            'treat_hd_caption' => 'required',
            'treat_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'treat_hd_title.required' => 'Treatment Header Title is required!',
            'treat_hd_caption.required' => 'Treatment Header Caption is required!',
            'treat_hd_image.image' => 'This is not an image!'
        ]);

        if($request->has('treat_hd_image')) {
            $image = time().'.'.$request->treat_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->treat_hd_image->move($destination, $image);

            $header->treat_hd_image = $image;
        }

        $header->treat_hd_title = $request->treat_hd_title;
        $header->treat_hd_caption = $request->treat_hd_caption;

        $header->update();

        return redirect('admin/treatments/headers')->with('success', 'updated treatment header');
    }


    public function destroyHeader(TreatmentHeader $header)
    {
        $header->delete();

        return redirect('admin/treatments/headers')->with('success', 'deleted treatment header');
    }


    public function active(TreatmentHeader $header)
    {
        $header->treat_hd_active = 1;

        $header->update();

        DB::table('treatment_headers')->where('treat_hd_id', '!=', $header->treat_hd_id)->update(['treat_hd_active' => 0]);

        return redirect('admin/treatments/headers')->with('success', 'used treatment header preset');

    }


    public function types()
    {
        $treatment_types = TreatmentType::all();

        return view('admin.treatments.type_index', compact('treatment_types'));        
    }


    public function createType()
    {
        return view('admin.treatments.type_add');
    }


    public function storeType(Request $request)
    {
        $this->validate($request, [
            'treat_type_name' => 'required'
        ],
        [
            'treat_type_name.required' => 'Treatment Type Name is required!',
        ]);

        $treatment_type = TreatmentType::create([
            'treat_type_name' => $request->treat_type_name,
        ]);

        return redirect('admin/treatments/types')->with('success', 'added treatment type');
    }


    public function editType(TreatmentType $type)
    {
        return view('admin.treatments.type_edit', compact('type'));
    }


    public function updateType(Request $request, TreatmentType $type)
    {
        $this->validate($request, [
            'treat_type_name' => 'required|unique:treatment_types,treat_type_name,'.$type->treat_type_id.',treat_type_id',

        ],
        [
            'treat_type_name.required' => 'Treatment Type Name is required!',
            'treat_type_name.unique' => 'Treatment Type Name already Exist!',
        ]);

        $type->treat_type_name = $request->treat_type_name;

        $type->update();

        return redirect('admin/treatments/types')->with('success', 'updated treatment type');
    }


    public function destroyType(TreatmentType $type)
    {
        $type->delete();

        $type->treatments()->delete();

        return redirect('admin/treatments/types')->with('success', 'deleted treatment type');
    }
}
