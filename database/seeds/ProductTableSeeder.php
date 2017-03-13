<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 20)->create();
        /*$product = new App\Product([
            'id_user' => '1',
            'name' => 'asd',
            'price' => 5,
            'image' => 'https://cdn.www.singtelshop.com/images/image/iphone-7-black-med.jpg',
            ]);
        $product->save();*/
    }
}
