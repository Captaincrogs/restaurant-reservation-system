<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {            


        $orders = Order::select('user_id', 'product_id')
        ->groupBy('user_id', 'product_id')
        ->havingRaw('COUNT(*) > 0')
        ->selectRaw('user_id, product_id, COUNT(*) as product_count')
        ->get();

        //get all reservations status attended and link with orders table
        $reservations = Reservation::where('status', 'attended')->get();

        

        return view('order', compact('orders', 'reservations'));

    


//make a relation between the order and the reservation and get the status of the reservation






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

    }
            }