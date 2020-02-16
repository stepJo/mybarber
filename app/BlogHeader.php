<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class BlogHeader extends Model
{
    protected $primaryKey = 'blog_hd_id';
    protected $guarded = [];

    public static function getActiveHeader()
    {
    	return DB::table('blog_headers')->where('blog_hd_active', 1)->first();
    }
}
