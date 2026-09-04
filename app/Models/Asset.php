<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets';

    protected $fillable = [
        'company_id',
        'category_id',
        'location_id',
        'employee_id',
        'asset_name',
        'serial_number',
        'model',
        'brand',
        'ram',
        'storage',
        'purchase_date',
        'purchase_price',
        'status',
        'notes',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'purchase_price' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     * Relasi ke Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Relasi ke Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relasi ke Location
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /**
     * Relasi ke Employee/Pemakai Aset
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}