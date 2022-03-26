<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('productos')->insert([
            'nombre' => 'producto 1',
            'precio' => 123.45,
            'impuesto' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'producto 2',
            'precio' => 45.65,
            'impuesto' => 15,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'producto 3',
            'precio' => 39.73,
            'impuesto' => 12,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'producto 4',
            'precio' => 250.00,
            'impuesto' => 8,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'producto 5',
            'precio' => 59.35,
            'impuesto' => 10,
        ]);


    }
}