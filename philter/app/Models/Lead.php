<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model {

    /****************************************
        Database attributes
    ****************************************/

    // define what can be mass assigned
    protected $fillable = [
        'lead_name',
        'lead_company',
        'lead_email',
        'lead_phone',
        'lead_address',
        'lead_city',
        'lead_state',
        'lead_zip',
        'lead_type',
        'lead_focus',
        'lead_involvement',
        'lead_boss'
    ];

    protected $dates = ['deleted_at'];

    /****************************************
        Database Relationships
    ****************************************/

    // one to many join to the Projects table
    public function projects() {
        return $this->hasMany('App\Models\Project');
    }
}
