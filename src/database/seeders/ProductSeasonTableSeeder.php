<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::find(1);
        $product->seasons()->sync([3, 4]);

        $product = Product::find(2);
        $product->seasons()->sync([1]);

        $product = Product::find(3);
        $product->seasons()->sync([4]);

        $product = Product::find(4);
        $product->seasons()->sync([2]);

        $product = Product::find(5);
        $product->seasons()->sync([2]);

        $product = Product::find(6);
        $product->seasons()->sync([2, 3]);

        $product = Product::find(7);
        $product->seasons()->sync([1, 2]);

        $product = Product::find(8);
        $product->seasons()->sync([2, 3]);

        $product = Product::find(9);
        $product->seasons()->sync([2]);

        $product = Product::find(10);
        $product->seasons()->sync([1, 2]);
    }
}
