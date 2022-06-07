<?php

namespace Database\Seeders;

use App\Models\Category;
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
        // only need this if database not refreshed
        // User::truncate();
        // Post::truncate();
        // Category::truncate();

        // original code
        // $user = User::factory()->create([
        //     'name' => 'John Doe'
        // ]);

        // Post::factory(5)->create([
        //     'user_id' => $user->id
        // ]);       

        // my modifications to add users to database
        $users = User::factory(10)->create();
        $numPostsPerUser = 1;

        foreach($users as $user){
            Post::factory($numPostsPerUser)->create([
                'user_id' => $user->id
            ]);       
        }
    }
}
