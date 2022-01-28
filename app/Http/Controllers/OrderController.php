<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {            
        
$order_class = new Order();
$orders = $order_class->getDuplicateOrders();
return view('order', compact('orders'));
        
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