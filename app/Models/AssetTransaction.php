<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetTransaction extends Model
{
    use HasFactory;

    protected $table = 'asset_transactions';

    protected $fillable = [
        'asset_id',
        'user_id',
        'transaction_type',
        'status',
        'employee_name',
        'department',
        'transaction_date',
        'return_date',
        'notes',
        'remarks',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'return_date' => 'date',
    ];

    public function asset()
    {
        return $this->belongsTo(
            Asset::class,
            'asset_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }
}