<?php

use Illuminate\Database\Seeder;

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Alimentacion;
use App\Models\Cita;
use App\Models\ComposicionCorporal;
use App\Models\Consulta;
use App\Models\InfoPaciente;
use App\Models\Macros;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(ComposicionCorporal::class,5)->create();
    }
}

?>