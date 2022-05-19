<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable =[
        'invoice',
        'customer_id',
        'user_id',
        'status',
        'total',

    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }
    public function order()
    {
    	return $this->hasMany(Order::class);
    }
}
