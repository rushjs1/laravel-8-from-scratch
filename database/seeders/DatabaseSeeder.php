<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // Post::truncate();
       // User::truncate();
       // Category::truncate();


        Post::factory(50)->create();

/* 
        $user = User::factory(10)->create();


        $personal = Category::create([
             'name' => 'Personal',
             'slug' => 'Personal'
         ]);

        $fam = Category::create([
             'name' => 'Family',
             'slug' => 'Family'
         ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'Work'
        ]);

        Post::create([
            'user_id' => $user->first()->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-first-work-post',
            'excerpt' => 'hey hello its cold outside',
            'body' => 'here is the body'
        ]);
        Post::create([
            'user_id' => $user->first()->id,
            'category_id' => $fam->id,
            'title' => 'My fam Post',
            'slug' => 'my-first-fam-post',
            'excerpt' => 'hey hello its cold outside',
            'body' => 'here is the body'
        ]);   
         Post::create([
            'user_id' => $user->first()->id,
            'category_id' => $personal->id,
            'title' => 'My personal Post',
            'slug' => 'my-first-personal-post',
            'excerpt' => 'hey hello its cold outside',
            'body' => 'here is the body'
        ]); */
    }
}
