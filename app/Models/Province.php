<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function getRouteKeyName(): string
    {
        return 'code';
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'province_id', 'id');
    }
}
