<?php

use Illuminate\Database\Seeder;
use App\Sinodal;

class SinodalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sinodal::class, 60)->create();
    }
}
