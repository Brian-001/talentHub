<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = 
    [
        'full_name',
        'phone_number',
        'nationality',
        'job_title',
        'job_description',
        'upload_pdf',
        'work_env',
    ];
}
