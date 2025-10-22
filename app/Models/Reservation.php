<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Reservation extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'checkin_at',
        'checkout_at',
    ];

    public function guests(){
        return $this->belongsToMany(Guest::class, 'reservation_guest')
        ->withPivot(['checkin_at', 'checkout_date','type'])
        ->withTimestamps();
    }
    public function payments():HasMany{
        return $this->hasMany(Payment::class);
    }
    public function services():BelongsToMany{
        return $this->belongsToMany(Service::class);
    }
    public function rooms():BelongsToMany{
        return $this->belongsToMany(Room::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
}
