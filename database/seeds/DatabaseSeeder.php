<?php

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
        // $this->call(UsersTableSeeder::class);
        // $this->call(DocumentsTableSeeder::class);

        factory(App\User::class, 50)->create();

        factory(App\Project::class, 50)->create()->each(function ($project) {
            $project->estimate()->save(factory(App\Estimate::class)->make());
            factory(App\Client::class, 1)->create(['user_id' => $project->user_id]);
        });

        factory(App\Task::class, 100)->create();
    }
}
