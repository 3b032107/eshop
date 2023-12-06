<?php

namespace Database\Seeders;

//use http\Client\Curl\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Product;
class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user){
            CartItem::factory(3)->create([
                'user_id' => $user->id,
                'product_id' => function(){
                    return Product::inRandomOrder()->first()->id;
                },
            ]);
        });
    }
}
