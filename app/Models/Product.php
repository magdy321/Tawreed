<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // إضافة الحقول الجديدة إلى $fillable
    protected $fillable = ['name', 'slug', 'description', 'price_regular', 'price_trader', 'unit', 'quantity'];

    // إذا أردت إضافة أية علاقات أو دوال أخرى يمكنك إضافتها هنا
        public function transactions()
        {
            return $this->belongsToMany(Transaction::class, 'product_transaction')
                        ->withPivot('quantity', 'unit_price', 'total_price')
                        ->withTimestamps();
        }

}
