<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Calzado',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Computadoras',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Electrónica',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Electrodomésticos',
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'Vestimenta',
        ]);
    }
}
