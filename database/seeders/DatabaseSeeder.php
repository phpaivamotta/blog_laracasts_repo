<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $users = User::factory(10)->create();
        $numPostsPerUser = 1;

        foreach($users as $user){
            Post::factory($numPostsPerUser)->create([
                'user_id' => $user->id
            ]);       
        }
    }
}
