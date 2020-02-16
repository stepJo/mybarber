<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $primaryKey = 'treat_id';
    protected $guarded = [];

    public function treatmentType()
    {
    	return $this->belongsTo(TreatmentType::class, 'treat_type_id');
    }
}
