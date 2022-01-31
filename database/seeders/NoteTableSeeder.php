<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::truncate();

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            Note::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
            ]);
        }
    }
}
