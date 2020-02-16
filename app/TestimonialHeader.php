<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TestimonialHeader extends Model
{
    protected $primaryKey = 'test_hd_id';
    protected $guarded = [];

    public static function getActiveHeader()
    {
    	return DB::table('testimonial_headers')->where('test_hd_active', 1)->first();
    }
}
