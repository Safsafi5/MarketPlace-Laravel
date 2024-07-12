<?php

namespace Modules\Shop\Repositories\Font;

use Modules\Shop\App\Models\Category;
use Modules\Shop\Repositories\Font\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface{
    public function findAll($options = []){
        return Category::orderBy('name', 'asc')->get();
    }

    public function findBySlug($slug){
        return Category::where('slug', $slug)->firstOrFail();
    }
}
