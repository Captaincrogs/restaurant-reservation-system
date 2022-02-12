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

        $total_price = 0;
        foreach ($orders as $order) {
            $total_price += $order->product_count * $order->product->price;
        }

    $reservations = Reservation::where('status', 'attended')->get();
    $products = Product::all();
    return view('order', compact('orders', 'reservations', 'products', 'total_price'));
    }


// echo '<table border="1">';
// echo '<tr><th>User</th><th>Product</th><th>Quantity</th></tr>';
// foreach ($orders as $order) {
//     echo '<tr>';
//     echo '<td>' . $order->user->name . '</td>';
//     echo '<td>' . $order->product->name . '</td>';
//     echo '<td>' . $order->product_count . '</td>';
//     echo '</tr>';
// }
// echo '</table>';

    

    public function newOrder(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ]);
            for ($i = 0; $i < $request->quantity; $i++) {
                Order::create([
                    'user' => $request->user,
                    'product' => $request->product,
                    'quantity' => $request->quantity,

                ]);
            }
            return redirect()->route('order');
    }
    }
