<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TeamHeader extends Model
{
    protected $primaryKey = 'tm_hd_id';
    protected $guarded = [];

    public static function getActiveHeader()
    {
    	return DB::table('team_headers')->where('tm_hd_active', 1)->first();
    }
}
