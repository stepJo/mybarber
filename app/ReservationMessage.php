<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ReservationMessage extends Model
{
    protected $primaryKey = 'rsv_msg_id';
    protected $guarded = [];


    public static function getConfirmMessage()
    {
    	return DB::table('reservation_messages')->where('rsv_msg_status', 'confirm')->first();
    }


    public static function getDismissMessage()
    {
    	return DB::table('reservation_messages')->where('rsv_msg_status', 'dismiss')->first();
    }
}
