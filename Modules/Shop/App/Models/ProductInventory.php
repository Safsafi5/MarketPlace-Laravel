<?php

namespace Modules\Shop\App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\Factories\ProductInventoryFactory;

class ProductInventory extends Model
{
    use HasFactory, UuidTrait;

    /**
     * The attributes that are mass assignable.
     */

     protected $table ='shop_product_inventories';
     protected $fillable = [
        'product_id',
        'qty',
        'low_stock_threshold'
     ];

    protected static function newFactory()
    {
        return ProductInventoryFactory::new();
    }
}
