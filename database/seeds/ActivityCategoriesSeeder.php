<?php

use Illuminate\Database\Seeder;

class ActivityCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_categories')->insert([
            'name' => 'Sport',
        ],[
        	'name' => 'Culturel',
        ],[
        	'name' => 'Voyage',
        ],[
        	'name' => 'Jeux',
        ]);
    }
}
