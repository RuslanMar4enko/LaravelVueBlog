<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            [
                'language_id' => 1,
                'name' => 'Books',
                'children' => [
                    [
                        'language_id' => 1,
                        'name' => 'Comic Book',
                        'children' => [
                            ['name' => 'Marvel Comic Book',
                                'language_id' => 1],
                            ['name' => 'DC Comic Book',
                                'language_id' => 1],
                            ['name' => 'Action comics','language_id' => 1],
                        ],
                    ],
                    [
                        'language_id' => 1,
                        'name' => 'Textbooks',
                        'children' => [
                            ['name' => 'Business', 'language_id' => 1],
                            ['name' => 'Finance', 'language_id' => 1],
                            ['name' => 'Computer Science', 'language_id' => 1],
                        ],
                    ],
                ],
            ],
            [
                'language_id' => 1,
                'name' => 'Electronics',
                'children' => [
                    [
                        'name' => 'TV',
                        'language_id' => 1,
                        'children' => [
                            ['name' => 'LED', 'language_id' => 1],
                            ['name' => 'Blu-ray', 'language_id' => 1],
                        ],
                    ],
                    [
                        'language_id' => 1,
                        'name' => 'Mobile',
                        'children' => [
                            ['name' => 'Samsung', 'language_id' => 1],
                            ['name' => 'iPhone', 'language_id' => 1],
                            ['name' => 'Xiomi', 'language_id' => 1],
                        ],
                    ],
                ],
            ],
        ];
        foreach($shops as $shop)
        {
            \App\Category::create($shop);
        }

    }
}
