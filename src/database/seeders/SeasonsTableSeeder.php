<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = ['春','夏','秋','冬'];

        foreach($seasons as $season){
            Season::firstOrCreate(['name'=> $season]);
        }
    }
}
