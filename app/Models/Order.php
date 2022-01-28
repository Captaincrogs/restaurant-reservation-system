<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // user has many orders
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getDuplicateOrders()
    {

        // count the number of same orders for each user
        $orders = Order::select('user_id', 'product_id')
            ->groupBy('user_id', 'product_id')
            ->havingRaw('COUNT(*) > 0')
            ->selectRaw('user_id, product_id, COUNT(*) as product_count')
            ->get();

            return $orders;

    //    return Order::query()->where('user_id', $this->product_id)->count();


    }
    }