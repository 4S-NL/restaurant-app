<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumableOrder extends Model
{
    use HasFactory;
    protected $table = 'consumable_order';
    protected $guarded = [];
}
