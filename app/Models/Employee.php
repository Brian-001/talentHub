<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/*extends Authenticatable i */
class Employee extends Authenticatable
{
    //
    use HasFactory, Notifiable;

    protected $table = 'employees';

    protected $fillable = [
        'user_id',
        'phone_number',
        'full_name',
        'job_role',
        'qualifications',
        'expected_salary',
        'cv_path',
        'is_approved_by_govt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
