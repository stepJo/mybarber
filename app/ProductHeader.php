<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ProductHeader extends Model
{
    protected $primaryKey = 'prd_hd_id';
    protected $guarded = [];

    public static function getActiveHeader()
    {
    	return DB::table('product_headers')->where('prd_hd_active', 1)->first();
    }
}
