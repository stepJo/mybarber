<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'prd_id';
    protected $guarded = [];

    public static function latest()
    {
    	return DB::table('products')->orderBy('prd_id', 'asc')->take(4)->get();
    }
}
