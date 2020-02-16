<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ServiceHeader extends Model
{
    protected $primaryKey = 'serv_hd_id';
    protected $guarded = [];

    public static function getActiveHeader()
    {
    	return DB::table('service_headers')->where('serv_hd_active', 1)->first();
    }
}
