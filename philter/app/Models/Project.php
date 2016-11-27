<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{

    /****************************************
     * Database attributes
     ****************************************/

    // define what can be mass assigned
    protected $fillable = [
        'project_name',
        'project_type',
        'project_description',
        'project_budget',
        'project_timeline',
        'project_hours',
        'project_size',
        'project_framework',
        'project_theme',
        'project_cms'
    ];

    protected $dates = ['deleted_at'];

    /****************************************
     * Database Relationships
     ****************************************/

    // one to many inverse join to User table
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    // one to many inverse join to Lead table
    public function lead()
    {
        return $this->belongsTo('App\Models\Lead');
    }
}
