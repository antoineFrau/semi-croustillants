<?php

use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sportActivities = ["Swiming", "Biking", "Fishing", "Camping", "Play tennis", "Kayaking", "Canoeing", "Football"];

        $culturalActivities = ["Literature", "Theatre", "Dance", "Museums", "Arts", "Music", "Film", "Culinary Arts"];

        foreach ($sportActivities as $activity) {
            DB::table('activities')->insert(['name' => $activity, "category_id" => 1]);
        }
        foreach ( $culturalActivities as $activity) {
            DB::table('activities')->insert(['name' => $activity, "category_id" => 2]);
        }
    }
}
