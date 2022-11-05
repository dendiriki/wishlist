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
        // \App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(HeadlineSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(RedakturSeeder::class);
        $this->call(RubikSeeder::class);
        $this->call(JurnalisSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
