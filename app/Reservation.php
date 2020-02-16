<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Request;

class Reservation extends Model
{
    protected $primaryKey = 'rsv_id';
    protected $guarded = [];

    public $timestamps = false;

    public function treatment()
    {
    	return $this->belongsTo(Treatment::class, 'treat_id');
    }


    public static function getReservation($rsv_status)
    {
        return DB::table('reservations')
            ->select('*')
            ->join('treatments', 'reservations.treat_id', '=', 'treatments.treat_id')
            ->where('rsv_status', $rsv_status)
            ->get();
    }


    public static function getMaxReservation($rsv_phone, $rsv_email)
    {
        return DB::table('reservations')
            ->where('rsv_phone', $rsv_phone)
            ->where('rsv_status', 0)
            ->orWhere('rsv_status', 1)
            ->get();
    }


    public static function countRsv()
    {
        return DB::table('reservations')
        ->select(DB::raw('count(*) as `total`'), DB::raw('MONTH(created_at) as month'))
        ->groupby('month')
        ->where('rsv_status', 3)
        ->get();
    }


    public static function favourite()
    {
        return DB::table('reservations')
        ->select(DB::raw('treat_name, COUNT(reservations.treat_id) as favourite'))
        ->join('treatments', 'reservations.treat_id', '=', 'treatments.treat_id')
        ->groupBy('treat_name')
        ->where('rsv_status', 3)
        ->first();
    } 
}
