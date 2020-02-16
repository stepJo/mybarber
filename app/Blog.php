<?php

namespace App;

use App\BlogCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $primaryKey = 'blog_id';
    protected $guarded = [];


    public function blogCategory()
    {
    	return $this->belongsTo(BlogCategory::class, 'blog_cat_id');
    }


    public static function latest()
    {
    	return DB::table('blogs')
        ->join('blog_categories', 'blogs.blog_cat_id', '=', 'blog_categories.blog_cat_id')
        ->orderBy('blog_post_date', 'asc')
        ->take(3)
        ->get();
    }
}
