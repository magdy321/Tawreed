<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'client_id',
        'transaction_type',
        'total_price',
        'paid',
        'remaining',
        
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_transactions')
                    ->withPivot('quantity', 'unit_price', 'total_price')
                    ->withTimestamps();
    }
}
