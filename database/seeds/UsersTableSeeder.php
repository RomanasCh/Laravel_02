<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 5)->states('with_posts', 'with_profiles')->create();
        \App\Models\User::create([
                                       'name' => 'Romas',
                                       'email' => 'romanas.chomskis@gmail.com',
                                       'password' => password_hash('secret',1),
                                       'remember_token' => str_random(10),
                                       'role_id' => 1
                                   ]);
    }
}
