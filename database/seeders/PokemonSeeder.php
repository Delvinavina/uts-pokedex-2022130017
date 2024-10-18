<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i <100; $i++){
            $name = $faker->name();
            $species = $faker->species(20);
            $primary_type = $faker->primary_type();
            $weight = $faker->weight();
            $height = $faker->height();
            $hp = $faker->hp();
            $attack = $faker->attack();
            $defense = $faker->defense();
            $is_legendary = $faker->is_legendary();
            DB::table('pokemon')->insert([
                'name' => $name,
                'species' => $species,
                'primary_type' => $primary_type,
                'weight' => $weight,
                'hp' => $hp,
                'attack' => $attack,
                'is_legendary' => $is_legendary,
            ]);
        }
    }
}