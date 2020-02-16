<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    protected $primaryKey = 'admin_id';
    protected $guarded = [];

    public function getAuthPassword()
    {
        return $this->admin_pwd;
    }
}
