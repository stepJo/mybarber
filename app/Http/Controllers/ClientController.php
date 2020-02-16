<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Customer;
use App\Gallery;
use App\Product;
use App\Profile;
use App\Reservation;
use App\Service;
use App\Setting;
use App\Slider;
use App\Team;
use App\Testimonial;
use App\Treatment;
use App\BlogHeader;
use App\GalleryHeader;
use App\ProductHeader;
use App\ReservationHeader;
use App\ServiceHeader;
use App\TeamHeader;
use App\TreatmentHeader;
use App\TestimonialHeader;
use App\TreatmentType;
use App\BlogCategory;
use App\GalleryTag;
use App\ErrorPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest();
        $products = Product::latest();
        $profile = Profile::first();
        $services = Service::all();
        $setting = Setting::first();
    	$sliders = Slider::all();
        $teams = Team::all();
        $testimonials = Testimonial::all();
        $treatments = Treatment::orderBy('treat_id', 'asc')->take(5)->get();

        $product_header = ProductHeader::getActiveHeader();
        $reservation_header = ReservationHeader::getActiveHeader();
    	$service_header = ServiceHeader::getActiveHeader();
        $team_header = TeamHeader::getActiveHeader();
    	$testimonial_header = TestimonialHeader::getActiveHeader();
        $treatment_header = TreatmentHeader::getActiveHeader();

        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        return view('client.home', compact(
        	'blogs','products','profile','services','setting','sliders','teams','testimonials','treatments',
            'product_header','reservation_header','service_header','team_header','testimonial_header',
            'treatment_header','links'
        ));        
    }


    //SERVICES
    public function services()

    {   $blogs = Blog::latest();
        $profile = Profile::first();
        $services = Service::all();
        $setting = Setting::first();
        
        $service_header = ServiceHeader::getActiveHeader();

        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        return view('client.services', compact(
            'blogs','profile','services','setting','service_header','links'
        ));
    }


    //TREATMENTS
    public function treatments()
    {
        $blogs = Blog::latest();
        $profile = Profile::first();
        $setting = Setting::first();
        $treatments = Treatment::all();

        $treatment_header = TreatmentHeader::getActiveHeader();
        $treatment_types = TreatmentType::all();

        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        return view('client.treatments', compact(
            'blogs', 'profile','setting','treatments','treatment_header','treatment_types','links'
        ));
    }


    //PRODUCTS
    public function products()
    {
        $blogs = Blog::latest();
        $products = Product::paginate(3);
        $profile = Profile::first();
        $setting = Setting::first();
        $total = count(Product::all());

        $product_header = ProductHeader::getActiveHeader();

        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        return view('client.products', compact(
            'blogs','products','profile','setting','total','product_header','links'
        ));
    }


    //BLOGS
    public function blogs()
    {
        $blogs = Blog::paginate(4);
        $profile = Profile::first();
        $recents = Blog::latest();
        $setting = Setting::first();
        
        $blog_categories = BlogCategory::all();
        $blog_header = BlogHeader::getActiveHeader();

        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        return view('client.blogs', compact(
            'blogs','profile','recents','setting','blog_categories','blog_header','links'
        ));
    }


    public function blog_categories($blog_cat_id)
    {
        $blogs = Blog::join('blog_categories', 'blogs.blog_cat_id', '=', 'blog_categories.blog_cat_id')->where('blogs.blog_cat_id', $blog_cat_id)->paginate(4);
        $profile = Profile::first();
        $recents = Blog::latest();
        $setting = Setting::first();
        
        $blog_categories = BlogCategory::all();
        $blog_header = BlogHeader::getActiveHeader();

        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        return view('client.blog_categories', compact(
            'blogs','profile','recents','setting','blog_categories','blog_header','links'
        ));
    }


    public function blog_details($blog_id)
    {
        
        $blog = Blog::join('blog_categories', 'blogs.blog_cat_id', '=', 'blog_categories.blog_cat_id')->where('blog_id', $blog_id)->first();
        $blogs = Blog::latest();
        $profile = Profile::first();
        $setting = Setting::first();   

        $related_blogs = Blog::join('blog_categories', 'blogs.blog_cat_id', '=', 'blog_categories.blog_cat_id')->where('blog_id', '!=', $blog_id)->where('blogs.blog_cat_id', $blog->blog_cat_id)->orderBy('blog_post_date', 'asc')->take(4)->get();
        
        $blog_categories = BlogCategory::all();
        $blog_header = BlogHeader::getActiveHeader();

        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        return view('client.blog_details', compact(
            'blog','blogs','profile','setting',
            'related_blogs',
            'blog_categories','blog_header',
            'links'
        ));
    }


    public function blog_search(Request $request)
    {
        $blog = Blog::where('blog_title', 'LIKE', "%".$request->keyword."%")->orWhere('blog_content', 'LIKE', "%".$request->keyword."%")->first();

        if($blog) {
            $blogs = Blog::latest();
            $profile = Profile::first();
            $setting = Setting::first();
                
            $all_blogs = Blog::all(); 
            $related_blogs = Blog::join('blog_categories', 'blogs.blog_cat_id', '=', 'blog_categories.blog_cat_id')->where('blog_id', '!=', $blog->blog_id)->where('blogs.blog_cat_id', $blog->blog_cat_id)->orderBy('blog_post_date', 'asc')->take(4)->get();

            $blog_categories = BlogCategory::all();
            $blog_header = BlogHeader::getActiveHeader();

            $links = new \stdClass();
            $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
            $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
            $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

            return view('client.blog_details', compact(
                'blog','blogs','profile','setting',
                'all_blogs','related_blogs',
                'blog_categories','blog_header','links'
            ));
        }

        else {
            return redirect('blogs');
        }
    }


    //GALLERY
    public function gallery()
    {
        $blogs = Blog::latest();
        $profile = Profile::first();
        $setting = Setting::first();
        $galleries = Gallery::all();

        $gallery_header = GalleryHeader::getActiveHeader();
        $gallery_tags = GalleryTag::all();

        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        return view('client.gallery', compact(
            'blogs','profile','setting','galleries',
            'gallery_header','gallery_tags','links'
        ));
    }


    //RESERVATION
    public function reservation()
    {   
        $blogs = Blog::latest();
        $profile = Profile::first();
        $setting = Setting::first();
    	$treatments = Treatment::all();

        $reservation_header = ReservationHeader::getActiveHeader();
        
        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        
    	return view('client.reservation', compact(
            'blogs','profile','setting','treatments',
            'reservation_header','links'
        ));
    }


    public function reserve(Request $request)
    {

    	$this->validate($request, [
            'rsv_treat' => 'required',
            'rsv_name' => 'required',
            'rsv_email' => 'required|email',
            'rsv_phone' => 'required|numeric',
            'rsv_date' => 'required',
            'rsv_time' => 'required'
        ],
        [
            'rsv_treat.required' => 'Please choose your treatment',
            'rsv_name.required' => 'Please fill in your name',
            'rsv_email.required' => 'Please fill in your email',
            'rsv_email.email' => 'Please fill in with valid email',
            'rsv_phone.required' => 'Please fill in your phone number',
            'rsv_date.required' => 'Please choose your date',
            'rsv_time.required' => 'Please choose your time'
        ]);

        $maximum_reservation = Reservation::getMaxReservation($request->rsv_phone, $request->rsv_email);

        if(count($maximum_reservation) >= 2) {
            return redirect('reservation')->with('maximum', 'You cannot make more than 2 reservations');
        }
        else {
            $reservation = Reservation::create([
            'treat_id' => $request->rsv_treat,
            'rsv_code' => 'RSV-'.date('dmYhms'),
            'rsv_name' => $request->rsv_name,
            'rsv_email' => $request->rsv_email,
            'rsv_phone' => $request->rsv_phone,
            'rsv_date' => date('d F Y', strtotime($request->rsv_date)),
            'rsv_time' => date('h:i a', strtotime($request->rsv_time)),
            'rsv_status' => 0,
            ]);

            $customer = Customer::firstOrCreate([
                'cust_name' => $request->rsv_name,
                'cust_email' => $request->rsv_email,
                'cust_phone' => $request->rsv_phone
            ]);

            return redirect('reservation')->with('success', 'Thank you, we will confirmed to your email soon');
        } 
    }

    public function error()
    {
        $error = ErrorPage::first();
        $profile = Profile::first();
        $setting = Setting::first();

        $links = new \stdClass();
        $links->facebook = 'https://facebook.com/'.$profile->profile_fb;
        $links->instagram = 'https://instagram.com/'.$profile->profile_ig;
        $links->twitter = 'https://twitter.com/'.$profile->profile_twitter;

        return view('errors.404', compact('error','profile', 'setting', 'links'));
    }
}
