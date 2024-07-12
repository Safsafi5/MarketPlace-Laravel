<?php

namespace Modules\Shop\App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\Factories\ProductAttributeFactory;

class ProductAttribute extends Model
{
    use HasFactory, UuidTrait;

    /**
     * The attributes that are mass assignable.
     */

    protected $table = 'shop_product_attributes';
    protected $fillable = [
        'product_id',
        'attribute_id',
        'string_value',
        'integer_value',
        'text_value',
        'boolean_value',
        'date_value',
        'json_value',
        'datetime_value',
        'float_value',
    ];

    protected static function newFactory()
    {
        return ProductAttributeFactory::new();
    }

    public function product(){
        return $this->belongsTo('Product');
    }


    public function attribute(){
        return $this->belongsTo('Attribute');
    }
}
