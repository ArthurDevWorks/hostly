<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillabe = [
        'reservation_id',
        'state_payment_id',
        'dt_payment',
        'total',
        'flag',
        'type',
        'hash'
    ];

    public function reservations():BelongsTo{
        return $this->belongsTo(Reservation::class);
    }

    public function statesPayment():HasMany{
        return $this->hasMany(PaymentStatus::class);
    }
}
