<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Customer;
use App\Product;
use App\Reservation;
use Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $favourite = Reservation::favourite();
        $products = Product::all();
        $blogs = Blog::all();

    	$finish_reservations = Reservation::getReservation(3);
    	$cancel_reservations = Reservation::getReservation(2);

    	return view('admin.dashboard', compact('customers','favourite','products','blogs','finish_reservations', 'cancel_reservations'));
    }


    public function send(Request $request)
    {
    	$this->validate($request, [
            'sender_email' => 'required|email',
            'sender_name' => 'required',
            'recepient' => 'required|email',
            'subject' => 'required',
            'content' => 'required'
        ],
        [
            'sender_email.required' => 'Sender Email is required!',
            'sender_email.email' => 'Email is not valid!',
            'sender_name.required' => 'Sender Name is required!',
            'recepient.required' => 'Recepient is required!',
            'recepient.email' => 'Email is not valid',
            'subject.required' => 'Subject is required!',
            'content.required' => 'Content is required!',
        ]);

        $data = [
            'sender_email' => $request->sender_email,
            'sender_name' => $request->sender_name,
            'subject' => $request->subject,
            'content' => $request->content
        ];

        Mail::to($request->recepient)->send(new SendMail($data));

        return redirect('admin/dashboard')->with('success', 'sending email');
    }
}
