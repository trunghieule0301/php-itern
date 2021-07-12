<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class categoriesSeeder extends Seeder
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
            'cate_name' => 'Phone',
            'cate_slug' => 'phone',
            'created_at' => new \DateTime(),
        ],
        [
            'cate_name' => 'Tablet',
            'cate_slug' => 'tablet',
            'created_at' => new \DateTime(),
        ],
        [
            'cate_name' => 'Laptop',
            'cate_slug' => 'laptop',
            'created_at' => new \DateTime(),
        ],
        [
            'cate_name' => 'Accessories',
            'cate_slug' => 'accessories',
            'created_at' => new \DateTime(),
        ],
        [
            'cate_name' => 'Watch',
            'cate_slug' => 'watch',
            'created_at' => new \DateTime(),
        ]
        ];
        \DB::table('categories')->insert($data);
    }
}
