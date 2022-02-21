<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call(RequisiteSeeder::class);
//        $this->call(PermissionsSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ModelHasRolesSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Post::factory(40)->create();
//        \App\Models\Product::factory(100)->create();
        \App\Models\Advertisement::factory(4)->create();
        \App\Models\PostTag::factory(100)->create();
    }
}
