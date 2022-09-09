<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $with = ['type'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function type()
    {
        return $this->belongsTo(ResourceType::class, 'resource_type_id');
    }

    public function getStatusAttribute()
    {
        if (!$this->active) {
            return 'Ikke tilgjengelig';
        }

        return 'Tilgjengelig';
    }
}
