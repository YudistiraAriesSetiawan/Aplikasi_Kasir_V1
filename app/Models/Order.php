<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'product_id',
        'invoice_id',
        'qty',
        'price',
        'total',

    ];

    protected $dates = ['deleted_at'];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
    public function invoice()
    {
    	return $this->belongsTo(Invoice::class);
    }
}
