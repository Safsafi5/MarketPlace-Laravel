<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\UuidTrait;

class Category extends Model
{
    use HasFactory, UuidTrait;

    /**
     * The attributes that are mass assignable.
     */


     protected $table = 'shop_categories';
     protected $fillable = [
        'parent_id',
        'slug',
        'name',
     ];

    protected static function newFactory()
    {
        return \Modules\Shop\Database\Factories\CategoryFactory::new();
    }

    public function children(){
        return $this->hasMany('Modules\Shop\App\Models\Category','parent_id');
    }

    public function parent(){
        return $this->belongsTo('Modules\Shop\App\Models\Category','parent_id');
    }

   public function products()
    {
        return $this->belongsToMany('Modules\Shop\App\Models\Product', 'shop_categories_products', 'product_id', 'category_id');
    }


    public static function childIDs($parentID = null){

        $categories = Category::where('id','name', 'parent_id')->where('parent_id' , $parentID)->get();

        $childIDs = [];
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $childIDs[] = $category->id;
                $childIDs = array_merge($childIDs, Category::childIDs($category->id));
            }
        }
        return $childIDs;
    }
}
