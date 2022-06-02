<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['descripcion' => 'Categoria 1']);
        Categoria::create(['descripcion' => 'Categoria 2']);
        Categoria::create(['descripcion' => 'Categoria 3']);
        Categoria::create(['descripcion' => 'Categoria 4']);
    }
}
