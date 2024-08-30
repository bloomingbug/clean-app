<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'province_id', 'id');
    }
}
