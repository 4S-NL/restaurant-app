<?php

namespace App\Http\Controllers;

use App\Models\ConsumableOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {

        // valideren
        // een table id (bestaand uit db)
        // een of meerdere conusmables moeten besteld zijn.
        $this->validate($request, [
        ]);

        $order = Order::create([
            'seat_id' => $request->table_id
        ]);

        foreach($request->consumable as $consumable) {
            ConsumableOrder::create([
                'order_id' => $order->id,
                'consumable_id' => $consumable
            ]);
        }

        return back()->with('message', 'Bestelling succesvol! U wordt zo spoedig mogelijk bediend!');

    }

    public function update(Request $request, Order $order) {

        if($request->type == 'dish') {
            $order->update([
                'dishes_ready_at' => now()
            ]);

        } else {
            $order->update([
                'drinks_ready_at' => now()
            ]);
        }

        return back();
    }
}
