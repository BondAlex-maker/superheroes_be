<?php

namespace Database\Seeders;

use App\Models\Superhero;
use Illuminate\Database\Seeder;

class DefaultSuperheroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuperHero::create([
            'nickname'=> "Superman",
            "real_name" => "Clark Kent",
            'origin_description' => 'LALALSGMIADF<OWCC<OWE <WEOF <C ASM U3h83h D# (DY*(#DH#',
            'superpowers' => 'SuperDuperPowers better than batman\'s',
            'catch_phrase' => 'Look, up in the sky, it\' a bird, it is a plane, it is Superman! ',
        ]);
    }
}
