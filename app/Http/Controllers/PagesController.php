<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seat;
use App\Models\Consumable;
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
}
