<?php

namespace Modules\Shop\App\Models;

use App\Models\User;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\factories\CartFactory;

class Cart extends Model
{
    use HasFactory, UuidTrait;

    /**
     * The attributes that are mass assignable.
     */


    protected $table='shop_carts';
    protected $fillable = [
        'user_id',
        'expired_at',
        'base_total_price',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(CartItem::class);
    }

    public function scopeForUser(Builder $query, User $user):void{
        $query->where('user_id', $user->id);
    }
}
