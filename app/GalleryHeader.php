<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class GalleryHeader extends Model
{
    protected $primaryKey = 'gal_hd_id';
    protected $guarded = [];

    public static function getActiveHeader()
    {
    	return DB::table('gallery_headers')->where('gal_hd_active', 1)->first();
    }
}
