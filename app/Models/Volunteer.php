<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'no',
        'name',
        'email',
        'phone',
        'personal_no',
        'presence_at',
        'presence_evidence',
        'campaign_id',
        'user_id',
        'deleted_by',
        'deleted_at',
    ];

    protected $hidden = [
        'id',
        'campaign_id',
        'user_id',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $casts = [
        'presence_at' => 'datetime',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
