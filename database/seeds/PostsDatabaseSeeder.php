<?php

use Illuminate\Database\Seeder;
use Versatile\Core\Traits\Seedable;

class PostsDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('Posts');
        $this->seed('Categories');
    }
}
