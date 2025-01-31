<?php

namespace Modules\Shop\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Shop\App\Models\Atribute;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Product;
use Modules\Shop\App\Models\ProductAttribute;
use Modules\Shop\App\Models\ProductInventory;
use Modules\Shop\App\Models\Tag;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::first();
        Atribute::setDefaultAttributes();
        $this->command->info('default attributes seeder!');
        $attributeWeight = Atribute::where('code', Atribute::ATTR_WEIGHT)->first();

        Category::factory()->count(10)->create();
        $this->command->info('categories seeder!');
        $randomCategoryIDs=Category::all()->random()->limit(2)->pluck('id');

        Tag::factory()->count(10)->create();
        $this->command->info('tags seeder!');
        $randomTagIDs=Tag::all()->random()->limit(2)->pluck('id');

        for($i=1 ;$i<=10; $i++){
            $manageStock =(bool)random_int(0,1);
            $product =Product::factory()->create([
                'user_id'=>$user->id,
                'manage_stock'=>$manageStock,
            ]);
            $product->categories()->sync($randomCategoryIDs);
            $product->tags()->sync($randomTagIDs);


        ProductAttribute::create([
            'product_id'=>$product->id,
            'attribute_id'=>$attributeWeight->id,
            'integer_value'=>random_int(200,2000), //gram
        ]);

        if($manageStock){
            ProductInventory::create([
                'product_id'=>$product->id,
                'qty' =>random_int(2,20),
                'low_stock_threshold' =>random_int(1,3),
            ]);
        }
    }
    $this->command->info('10 products seeder!');



    }
}
