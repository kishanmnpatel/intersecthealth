<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'id' => 1,
            'name' => '5 citybreak ideas for this year',
            'excerpt' => 'Curabitur sem lorem, faucibus ac enim ut, vestibulum feugiat ante.',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet nulla nulla. Donec luctus lorem justo, ut ullamcorper eros pellentesque ut.</p>',
            'category_id' => 1,
            'status' => 'Published',
            'date' => now()->format('Y-m-d'),
            'picture' => 'img1.jpg',
            'show_on_homepage' => 1,
            'options' => '["1","2"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'id' => 2,
            'name' => 'Top 10 restaurants in Italy',
            'excerpt' => 'Mauris sodales leo erat, at vehicula tellus molestie fringilla.',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet nulla nulla. Donec luctus lorem justo, ut ullamcorper eros pellentesque ut.</p>',            'category_id' => 2,
            'status' => 'Published',
            'date' => now()->format('Y-m-d'),
            'picture' => 'img2.jpg',
            'show_on_homepage' => 1,
            'options' => '["1","2"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'id' => 3,
            'name' => 'Cocktail ideas for your birthday party',
            'excerpt' => 'Vestibulum semper semper urna a tincidunt.',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet nulla nulla. Donec luctus lorem justo, ut ullamcorper eros pellentesque ut.</p>',            'category_id' => 2,
            'status' => 'Published',
            'date' => now()->format('Y-m-d'),
            'show_on_homepage' => 1,
            'picture' => 'img3.jpg',
            'options' => '["0", "1", "2"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('item_tag')->insert(
            [
                'item_id' => 1,
                'tag_id' => 1,
            ]
        );

        DB::table('item_tag')->insert(
            [
                'item_id' => 1,
                'tag_id' => 2,
            ]
        );

        DB::table('item_tag')->insert(
            [
                'item_id' => 1,
                'tag_id' => 3,
            ]
        );

        DB::table('item_tag')->insert(
            [
                'item_id' => 2,
                'tag_id' => 1,
            ]
        );

        DB::table('item_tag')->insert(
            [
                'item_id' => 3,
                'tag_id' => 1,
            ]
        );
    }
}
