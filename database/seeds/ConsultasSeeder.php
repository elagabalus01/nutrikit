<?php

use Illuminate\Database\Seeder;
use App\Models\Consulta;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Consulta::class,5)->create();
    }
}

?>