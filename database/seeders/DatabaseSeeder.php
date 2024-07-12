<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Shop\Database\Seeders\ShopDatabaseSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
    if ($this->command->confirm('Do you want to run the shop seeders? [y|N]')) {
        $this->command->call('migrate:refresh');
        $this->command->info('Data clearing, starting from blank dataabse!');
    }

    User::factory()->create();
    $this->command->info('Sample user seeder!');

    if($this->command->confirm('Do you want to seed some sample data')) {
        $this->call(ShopDatabaseSeeder::class);
    }
    }
}
