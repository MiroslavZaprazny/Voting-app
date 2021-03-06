<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(1)->create([
            'name' => 'Mirko',
            'email' => 'miro.zaprazny8@gmail.com',
            'password' => bcrypt(env('ADMIN_PASSWORD')),
        ]);
        User::factory(19)->create();

        Status::factory()->create(['name' => 'Open']);
        Status::factory()->create(['name' => 'Considering']);
        Status::factory()->create(['name' => 'In progress']);
        Status::factory()->create(['name' => 'Implemented']);
        Status::factory()->create(['name' => 'Closed']);

        Category::factory()->create(['name' => 'Category 1']);
        Category::factory()->create(['name' => 'Category 2']);
        Category::factory()->create(['name' => 'Category 3']);
        Category::factory()->create(['name' => 'Category 4']);

        Idea::factory(100)->create();

        foreach (range(1, 20) as $user_id) {
            foreach (range(1, 100) as $idea_id) {
                if ($idea_id % 2 == 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id
                    ]);
                }
            }
        }

        foreach(Idea::all() as $idea)
        {
            Comment::factory(5)->create(['idea_id' => $idea->id]);
        }
    }
}
