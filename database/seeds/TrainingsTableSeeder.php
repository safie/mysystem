<?php

use Illuminate\Database\Seeder;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('trainings')->insert([
            'title'=>'Laravel Development Training'
        ])
    }
}
