<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryTag extends Model
{
    protected $primaryKey = 'gal_tag_id';
    protected $guarded = [];

    public function galleries()
    {
    	return $this->hasMany(Gallery::class, 'gal_tag_id');
    }
}
