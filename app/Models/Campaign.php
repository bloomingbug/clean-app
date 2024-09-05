<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'event_date',
        'event_time',
        'cover',
        'description',
        'longitude',
        'latitude',
        'vote',
        'address',
        'proposed_by_id',
        'is_approved',
        'approved_by',
        'approved_at',
        'city_id',
        'total_fund',
        'target_fund',
        'due_date_fund',
        'target_volunteer',
        'due_date_volunteer',
        'deleted_by',
        'deleted_at',
    ];

    protected $hidden = [
        'id',
        'proposed_by_id',
        'city_id',
        'deleted_by',
        'deleted_at',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function cover(): Attribute
    {
        return Attribute::make(
            get: fn ($cover) => $cover ? asset('storage/media/'.$cover) : null,
        );
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'campaign_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function proposedBy()
    {
        return $this->belongsTo(User::class, 'proposed_by_id', 'id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'campaign_id', 'id');
    }

    public function volunteers()
    {
        return $this->hasMany(Volunteer::class, 'campaign_id', 'id');
    }
}
