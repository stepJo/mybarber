<?php

namespace App;

use App\Blog;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $primaryKey = 'blog_cat_id';
    protected $guarded = [];

    public function blogs()
    {
    	return $this->hasMany(Blog::class, 'blog_cat_id');
    }
}
