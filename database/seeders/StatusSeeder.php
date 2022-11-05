<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['statuses' => 'Belum di verifikasi']);
        Status::create(['statuses' => 'Publish']);
        Status::create(['statuses' => 'Draft']);
        Status::create(['statuses' => 'Tolak']);
    }
}
