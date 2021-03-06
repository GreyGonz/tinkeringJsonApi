<?php

use Illuminate\Database\Seeder;
use App\Thread;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Thread::class, 10)->create();
    }
}
