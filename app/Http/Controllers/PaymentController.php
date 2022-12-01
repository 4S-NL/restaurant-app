<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request) {
        $consumables = [];
        foreach($request->consumable as $consumable) {
            $consumables[] = Consumable::find($consumable);
        }

        return view('payment', [
            'consumables' => $consumables
        ]);
    }

}
