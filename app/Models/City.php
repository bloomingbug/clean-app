<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'province_id',
    ];

    protected $hidden = [
        'id',
        'province_id',
        'created_at',
        'updated_at',
    ];

    public function getRouteKeyName(): string
    {
        return 'code';
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
