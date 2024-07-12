<?php

namespace Modules\Shop\App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\Factories\AttributeOptionFactory;

class AttributeOption extends Model
{
    use HasFactory, UuidTrait;

    /**
     * The attributes that are mass assignable.
     */

     protected $table = 'shop_attribute_options';
    protected $fillable = [
        'attribute_id',
        'name',
        'slug',
    ];

    protected static function newFactory()
    {
        return AttributeOptionFactory::new();
    }
}
