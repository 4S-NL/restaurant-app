<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seat;
use App\Models\Consumable;
use App\Models\Order;
use Illuminate\Http\Request;
use PDO;

class PagesController extends Controller
{
    // returns the view for ordering items
    public function menu() {
        $categories = Category::all();
        $consumableCount = Consumable::count();
        $seats = Seat::all();

        return view('menu', [
            'categories'    => $categories,
            'seats'         => $seats,
            'consumableCount' => $consumableCount
        ]);
    }

    public function bar() {
        $orders = Order::where('created_at', '>', \Carbon\Carbon::today())
                        ->whereNull('drinks_ready_at')->get();

        return view('bar', [
            'orders'=> $orders
        ]);
    }

    public function keuken() {
        $orders = Order::where('created_at', '>', \Carbon\Carbon::today())
            ->whereNull('dishes_ready_at')->get();

        return view('keuken', [
            'orders' => $orders
        ]);
    }
}
