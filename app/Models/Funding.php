<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'no',
        'name',
        'email',
        'amount',
        'is_anonymous',
        'message',
        'status',
        'snap_token',
        'campaign_id',
        'donatur_id',
    ];

    protected $hidden = [
        'id',
        'campaign_id',
        'donatur_id',
        'updated_at',
    ];

    public function getRouteKeyName()
    {
        return 'no';
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }

    public function donatur()
    {
        return $this->belongsTo(User::class, 'donatur_id', 'id');
    }
}
