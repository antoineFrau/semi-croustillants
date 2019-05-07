<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('status')->insert(
            array(
                'title' => 'En ligne',
                'day_start' => 0,
                'day_end' => 6,
                'hour_start' => 0,
                'hour_end' => 2400,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ));
    	DB::table('status')->insert(
            array(
                'title' => 'Hors ligne',
                'day_start' => 0,
                'day_end' => 6,
                'hour_start' => 0,
                'hour_end' => 2400,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ));
        DB::table('status')->insert(
            array(
                'title' => 'Boulot',
                'day_start' => 1,
                'day_end' => 5,
                'hour_start' => 800,
                'hour_end' => 1800,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ));
        DB::table('status')->insert(
            array(
                'title' => 'Pause Dej.',
                'day_start' => 1,
                'day_end' => 5,
                'hour_start' => 1200,
                'hour_end' => 1400,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ));
        DB::table('status')->insert(
            array(
                'title' => 'Apéro',
                'day_start' => 1,
                'day_end' => 5,
                'hour_start' => 1801,
                'hour_end' => 2300,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ));
        DB::table('status')->insert(
            array(
                'title' => 'Gaming',
                'day_start' => 1,
                'day_end' => 5,
                'hour_start' => 2301,
                'hour_end' => 759,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ));
    }
}
