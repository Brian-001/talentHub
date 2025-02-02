<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //
    protected $fillable = [
        'full_name',
        'phone_number',
        'nationality',
        'job_title',
        'job_qualifications',
        'resumecv_path',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
