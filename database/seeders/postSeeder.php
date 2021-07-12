<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        [
            'product_name' => 'iPhone 12 64Gb',
            'product_content' => 'phone',
            'product_cate' => 2,
            'product_price' => 22990000,
            'created_at' => new \DateTime(),
        ],
        [
            'product_name' => 'iPhone 12 128Gb',
            'product_content' => 'phone',
            'product_cate' => 2,
            'product_price' => 24990000,
            'created_at' => new \DateTime(),
        ],
        [
            'product_name' => 'iPhone 12 256Gb',
            'product_content' => 'phone',
            'product_cate' => 2,
            'product_price' => 25990000,
            'created_at' => new \DateTime(),
        ],
        [
            'product_name' => 'iPhone 12 Pro 128Gb',
            'product_content' => 'phone',
            'product_cate' => 2,
            'product_price' => 28490000,
            'created_at' => new \DateTime(),
        ],
        [
            'product_name' => 'iPhone 12 Pro 256Gb',
            'product_content' => 'phone',
            'product_cate' => 2,
            'product_price' => 28990000,
            'created_at' => new \DateTime(),
        ],
        [
            'product_name' => 'iPhone 12 Pro 512Gb',
            'product_content' => 'phone',
            'product_cate' => 2,
            'product_price' => 35990000,
            'created_at' => new \DateTime(),
        ],
        [
            'product_name' => 'iPad Air 4 Wifi 64GB (2020)',
            'product_content' => 'ipad',
            'product_cate' => 3,
            'product_price' => 16790000,
            'created_at' => new \DateTime(),
        ],
        [
            'product_name' => 'iPad Pro M1 12.9 inch WiFi Cellular 256GB (2021)',
            'product_content' => 'ipad',
            'product_cate' => 3,
            'product_price' => 38490000,
            'created_at' => new \DateTime(),
        ],
        [
            'product_name' => 'iPad Pro 11 inch Wifi Cellular 128GB (2020)',
            'product_content' => 'ipad',
            'product_cate' => 3,
            'product_price' => 26290000,
            'created_at' => new \DateTime(),
        ],
        [
            'product_name' => 'MacBook Pro M1 2020 16GB/512GB/Space Grey (Z11C)',
            'product_content' => 'laptop',
            'product_cate' => 4,
            'product_price' => 41840000,
            'created_at' => new \DateTime(),
        ],
        ];
        \DB::table('product')->insert($data);
    }
}
