<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CanCheckin;
use App\Traits\CanMakeReservations;
use App\Traits\HasRoles;
use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    use HasRoles, CanCheckin, CanMakeReservations;

    /**
     * Disable Mass Assignment protection
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'last_active_at' => 'datetime',
        'anonymized_at' => 'datetime',
    ];

    /**
     * Anonymizes the current user
     *
     * @return void
     */
    public function anonymize(): void
    {
        $this->update([
            'name' => null,
            'email' => null,
            'avatar_path' => null,
            'remember_token' => null,
            'anonymized_at' => now(),
        ]);
    }
}
