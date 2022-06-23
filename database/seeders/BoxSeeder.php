<?php

namespace Database\Seeders;

use App\Models\Box;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     Box::factory()
    //         ->count(50)
    //         ->create();
    // }

    public function run()
    {
        DB::table('boxes')->insert([
            'name' => Str::random(10),
            'color' => 'blue',
            'user_id' => 1,
        ]);
    }
}
