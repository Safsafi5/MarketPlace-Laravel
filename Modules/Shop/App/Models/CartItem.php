<?php

namespace Modules\Shop\App\Models;

use App\Models\User;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\factories\CartFactory;

class CartItem extends Model
{
    use HasFactory, UuidTrait;

    /**
     * The attributes that are mass assignable.
     */


    protected $table='shop_cart_items';
    protected $fillable = [
        'user_id',

    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getSubTotalAttribute(){
        return number_format($this->qty * $this->product->price);
    }
}
