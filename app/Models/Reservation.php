<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);

        
    }

    //date is a fillable property
    protected $fillable = ['date', 'time', 'message', 'user_id', 'people', 'status'];
    

}
