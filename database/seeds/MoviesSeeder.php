<?php

use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = \Faker\Factory::create();

        for ($n = 0; $n < 150; $n++) {
            $movie = new App\Movie();

            $movie->title = $factory->text(20);
            $movie->description = $factory->text(60);
            $movie->status = random_int(1, 2);
            $movie->rating = random_int(1, 10);
            $movie->user_list_id = random_int(1, 250);

            $movie->save();
        }
    }
}
