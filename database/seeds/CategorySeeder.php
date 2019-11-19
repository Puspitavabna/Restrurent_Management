<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::insert([
            [
                'id' => '1',
                'name' => 'Vegetarian Appetizers',
                'category_slug' => 'vegetarian-appetizers'

            ],
            [
                'id' => '2',
                'name' => 'Non-Vegetarian Appetizers',
                'category_slug' => 'non-vegetarian-appetizers'
            ],
            [
                'id' => '3',
                'name' => 'Soups and Salads',
                'category_slug' => 'soup-salads'
            ],
            [
                'id' => '4',
                'name' => 'Special Lunch and Combos',
                'category_slug' => 'special-lunch-combos'

            ],
            [
                'id' => '5',
                'name' => 'Vegetarian Curries',
                'category_slug' => 'vegetarian-curries'
            ],
            [
                'id' => '6',
                'name' => 'Non-Vegetarian Curries',
                'category_slug' => 'non-vegetarian-curries'
            ],
            [
                'id' => '7',
                'name' => 'Kids Meals',
                'category_slug' => 'kids-meals'

            ],
            [
                'id' => '8',
                'name' => 'Rice Pulao and Biryani',
                'category_slug' => 'rice-pulao-biriyani'
            ],
            [
                'id' => '9',
                'name' => 'Breads',
                'category_slug' => 'breads'
            ],
            [
                'id' => '10',
                'name' => 'Desserts',
                'category_slug' => 'desserts'
            ],
            [
                'id' => '11',
                'name' => 'Beverages',
                'category_slug' => 'beverages'
            ],
            [
                'id' => '12',
                'name' => 'Yogurt/ Dahi',
                'category_slug' => 'yogurt'
            ]


        ]);

    }
}
