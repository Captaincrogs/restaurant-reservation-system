<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {            


//calculate the total price of each specific user in orders table
    $orders = Order::select('user_id', 'product_id')
        ->groupBy('user_id', 'product_id')
        ->havingRaw('COUNT(*) > 0')
        ->selectRaw('user_id, product_id, COUNT(*) as product_count')
        ->get();

//total price
    $total_price = 0;
    foreach ($orders as $order) {
        $total_price += $order->product_count * $order->product->price;
    }

    $reservations = Reservation::where('status', 'attended')->get();
    $products = Product::all();
    return view('order', compact('orders', 'reservations', 'products', 'total_price'));
    }


    public function newOrder(Request $request)
    {
            for ($i = 0; $i < $request->quantity; $i++) {
                 Order::create([
                    'user_id' => $request->user_id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,


                ]);

            }
        
            
        return redirect()->back()->with('success', 'Order has been placed successfully');
    }
}

