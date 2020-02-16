<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TreatmentHeader extends Model
{
    protected $primaryKey = 'treat_hd_id';
    protected $guarded = [];

    public static function getActiveHeader()
    {
    	return DB::table('treatment_headers')->where('treat_hd_active', 1)->first();
    }
}
