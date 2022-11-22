<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $with = ['type', 'bookings'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function type()
    {
        return $this->belongsTo(ResourceType::class, 'resource_type_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bookingsByDate($date)
    {
        return $this->bookings()->where('date', $date)->with('bookings.user')->get();
    }

    public function getStatusAttribute()
    {
        if (!$this->active) {
            return 'Ikke tilgjengelig';
        }

        return 'Tilgjengelig';
    }

    public function booked($date, $period)
    {
        return $this->bookings()
            ->where('date', $date)
            ->where('period', $period)
            ->first();
    }

}
