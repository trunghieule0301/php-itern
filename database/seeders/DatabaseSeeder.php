<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Hieu',
            'username' => 'trunghieu1',
            'password' => bcrypt('123456789'),
            'created_at' => new \DateTime(),
        ];
        $data1 = [
            'name' => 'Trung Hieu',
            'username' => 'trunghieu2',
            'password' => bcrypt('123456'),
            'created_at' => new \DateTime(),
        ];
        $data2 = [
            'name' => 'Ngoc Minh',
            'username' => 'ngocminh2',
            'password' => bcrypt('123456'),
            'created_at' => new \DateTime(),
        ];
        \DB::table('users')->insert($data2);
    }
}
