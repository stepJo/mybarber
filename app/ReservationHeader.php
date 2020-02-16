<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ReservationHeader extends Model
{
    protected $primaryKey = 'rsv_hd_id';
    protected $guarded = [];


    public static function getActiveHeader()
    {
    	return DB::table('reservation_headers')->where('rsv_hd_active', 1)->first();
    }
}
