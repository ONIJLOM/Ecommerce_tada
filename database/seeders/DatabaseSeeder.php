<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(PermisoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(AdmSeeder::class);
        $this->call(EmpSeeder::class);
        $this->call(ClienSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(PesoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(NotaIngresoSeeder::class);

    }
}
