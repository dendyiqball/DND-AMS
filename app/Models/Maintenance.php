<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenances';

    protected $fillable = [
        'asset_id',
        'maintenance_date',
        'problem',
        'action_taken',
        'technician',
        'cost',
        'status',
    ];

    protected $casts = [
        'maintenance_date' => 'date',
        'cost' => 'decimal:2',
    ];

    /**
     * Maintenance belongs to Asset
     */
    public function asset()
    {
        return $this->belongsTo(
            Asset::class,
            'asset_id'
        );
    }
}