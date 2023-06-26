<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['product_id','product_name','product_count','product_price','status','phone','created_at','modified_at'];

    public $timestamps = false;
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
