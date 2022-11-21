<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory, RecordsActivity;

    protected $guarded = [];

    protected $casts = [
        'checkin_at' => 'datetime',
        'checkout_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalTimeAttribute()
    {
        if (!$this->checkout_at) {
            return null;
        }

        return $this->checkout_at->diffInMinutes($this->checkin_at);
    }
}
