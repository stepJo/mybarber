<?php

namespace App\Http\Controllers;

use App\ErrorPage;
use Illuminate\Http\Request;

class ErrorPageController extends Controller
{
    public function index()
    {
    	$error = ErrorPage::first();

    	return view('admin.errors.index', compact('error'));
    }

    public function update(Request $request, ErrorPage $error)
    {
    	if($request->error_pg_title != '') {
            $error->error_pg_title = $request->error_pg_title;
        }

        if($request->error_pg_desc != '') {
            $error->error_pg_desc = $request->error_pg_desc;
        }

        if($request->has('error_pg_image')) {
            $image = time().'.'.$request->error_pg_image->extension();

            $destination = public_path('assets/uploads');

            $request->error_pg_image->move($destination, $image);

            $error->error_pg_image = $image;
        }

        $error->update();

        return redirect('admin/errors')->with('success', 'updated 404 error page');
    }
}
