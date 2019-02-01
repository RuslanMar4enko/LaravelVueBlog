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
                'language' => 'en',
                'name' => 'Books',
                'children' => [
                    [
                        'language' => 'en',
                        'name' => 'Comic Book',
                        'children' => [
                            ['name' => 'Marvel Comic Book',
                                'language' => 'en'],
                            ['name' => 'DC Comic Book',
                                'language' => 'en'],
                            ['name' => 'Action comics','language' => 'en'],
                        ],
                    ],
                    [
                        'language' => 'en',
                        'name' => 'Textbooks',
                        'children' => [
                            ['name' => 'Business', 'language' => 'en'],
                            ['name' => 'Finance', 'language' => 'en'],
                            ['name' => 'Computer Science', 'language' => 'en'],
                        ],
                    ],
                ],
            ],
            [
                'language' => 'en',
                'name' => 'Electronics',
                'children' => [
                    [
                        'name' => 'TV',
                        'language' => 'en',
                        'children' => [
                            ['name' => 'LED', 'language' => 'en'],
                            ['name' => 'Blu-ray', 'language' => 'en'],
                        ],
                    ],
                    [
                        'language_id' => 1,
                        'name' => 'Mobile',
                        'children' => [
                            ['name' => 'Samsung', 'language' => 'en'],
                            ['name' => 'iPhone', 'language' => 'en'],
                            ['name' => 'Xiomi', 'language' => 'en'],
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
