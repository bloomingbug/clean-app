<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'link',
    ];

    protected $hidden = [
        'id',
        'campaign_id',
        'created_at',
        'updated_at',
    ];

    public function link(): Attribute
    {
        return Attribute::make(get: fn ($link) => asset('storage/media/', $link));
    }
}
