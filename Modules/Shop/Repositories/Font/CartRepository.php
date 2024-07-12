<?php

namespace Modules\Shop\Repositories\Font;

use App\Models\User;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\Repositories\Font\Interfaces\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface{
   public function findByUser(User $user){
       $cart= Cart::with(['items', 'items.product'])->forUser($user)->first();
       return $cart;
   }
}
