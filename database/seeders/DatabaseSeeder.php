<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 25; $i++) {

            $quantity       = rand(1, 100);
            $price          = substr(str_shuffle('123457838754321'), 1, 2);

            $catArr         = Arr::shuffle([
                                    'მაისურები', 
                                    'ქუდები',
                                    'ბრელოკები', 
                                    'ჭიქები', 
                                    'კალმები', 
                                    'სანთებელები',
                                ]);

            $percentArr     = Arr::shuffle([0, 10, 20, 50, 60]);

            $priceInTotal   = ($quantity * $price);

            $actionPercent  = $percentArr[0];

            if($percentArr[0] == 0) {
                $discount = '0.00';
                $actionPrice = '0.00';  

            } else {
                $discount       = ($price / 100) * $percentArr[0];
                $actionPrice    = ($price - $discount);
            }
            
            DB::table('products')->insert([
                'product_id' => substr(str_shuffle('123457838754321'), 0, 12),
                'name' => 'პროდუქციის სახელი '. $i,
                'category' => $catArr[0],
                'quantity' => $quantity,
                'price' => $price,
                'price_in_total' => $priceInTotal,
                'action_percent' => $actionPercent,
                'action_price' => $actionPrice,
                'discount' => $discount,
                'size' => null,
                'image' => null,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
