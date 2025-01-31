<?php

namespace Modules\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Shop\App\Models\Tag::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $name= fake()->sentence(1);
        return [
            'name' => $name,
            'slug'=> Str::slug($name)
        ];
    }
}

