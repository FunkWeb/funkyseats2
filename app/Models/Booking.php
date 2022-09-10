<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function availability($resource, $date)
    {
//        return $this->where('resource_id', $resource)->
    }
}
