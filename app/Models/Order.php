<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $guarded = [];

    public function getStatusAttribute($val)
    {
        if ($val == 0) {
            return __('dashboard.checking');
        } elseif ($val == 1) {
            return __('dashboard.on_his_way');
        } else {
            return __('dashboard.delivered');
        }
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('amount');
    }
}
