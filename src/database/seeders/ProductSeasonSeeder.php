<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Database\Seeder;

class ProductSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productSeason = [

            'キウイ' => [3,4],
            'ストロベリー' => [1],
            'オレンジ' => [4],
            'スイカ' => [2],
            'ピーチ' => [2],
            'シャインマスカット' => [2,3],
            'パイナップル' => [1,2],
            'ブドウ' => [2,3],
            'バナナ' => [2],
            'メロン' => [1,2],
        ];

        foreach ($productSeason as $productName => $seasonIds){
            Product::where('name',$productName)->first()->seasons()->attach($seasonIds);
        }
    }
}
