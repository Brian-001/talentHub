# Laravel and Fortify user multi-auth

### Employee model 

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

```

`extends authenticatable` indicates that the `Employee` model inherits from `Illuminate\Foundation\Auth\User` class which provides the necessary functionality for authentication eg.(password hashing, session mananagement)

`protected $table = 'employees'` specifies the model corresponds to `employees` table

`Employee` belongs to a single instance of `User`