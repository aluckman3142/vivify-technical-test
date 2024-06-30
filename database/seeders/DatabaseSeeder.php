<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
       $teams = \App\Models\Team::factory(3)->create();
       $users = \App\Models\User::factory(10)->create();

        $teams->each(function (\App\Models\Team $team) use ($users) {
            $team->users()->attach(
                $users->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
