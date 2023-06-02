<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Product 3',
                'price' => 10.99,
            ],
            [
                'name' => 'Product 4',
                'price' => 19.99,
            ],
            // Tambahkan data produk lainnya di sini
        ];

        foreach ($products as $product) {
            $encryptedId = Product::create($product)->getRouteKey();
            $this->command->info("Product created with encrypted ID: $encryptedId");
        }
    }
}
