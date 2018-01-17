<?php

use Illuminate\Database\Seeder;

class UserListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = \Faker\Factory::create();

        for ($n = 0; $n < 50; $n++) {
            $user_list = new App\UserList();

            $user_list->title = $factory->text(31);
            $user_list->type = 1;
            $user_list->user_id = random_int(1, 50);

            $user_list->save();
        }
    }
}
