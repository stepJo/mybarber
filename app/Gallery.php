<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $primaryKey = 'gal_id';
    protected $guarded = [];

    public function galleryTag()
    {
    	return $this->belongsTo(GalleryTag::class, 'gal_tag_id');
    }
}
