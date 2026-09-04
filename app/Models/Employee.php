<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'employee_code',
        'employee_name',
        'department',
        'position',
        'email',
        'phone',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     * Assets yang digunakan oleh employee.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class, 'employee_id');
    }
}
