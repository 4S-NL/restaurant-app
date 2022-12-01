<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = [];

    public function seat() {
        return $this->belongsTo(Seat::class, 'seat_id');
    }

    public function consumables() {
        return $this->hasManyThrough(Consumable::class, ConsumableOrder::class, 'order_id', 'id', 'id', 'consumable_id');
    }
}
