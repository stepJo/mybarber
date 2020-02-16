<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentType extends Model
{
    protected $primaryKey = 'treat_type_id';
    protected $guarded = [];

    public function treatments()
    {
    	return $this->hasMany(Treatment::class, 'treat_type_id');
    }
}
