<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create 10 users using the user factory
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'jd@gmail.com'
            ]);

        // create  listings using the listing factory
        Listing::factory(8)->create([
            'user_id' => $user->id
        ]);
        // Listing::create([
        //     'title' => 'Need of a PHP Developer ',
        //     'tags' => 'php,html,css',
        //     'company' => 'Jumia',
        //     'location' => 'Lagos, Nigeria',
        //     'email' => 'careers@jumia.com',
        //     'website' => 'https://jumia.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        // ]);

        // Listing::create([
        //     'title' => 'Need of a Next Developer',
        //     'tags' => 'Next, React, Node, REST, GraphQL, TypeScript, TailwindCSS',
        //     'company' => 'Netflix',
        //     'location' => 'California, USA',
        //     'email' => 'carrers@neflix.com',
        //     'website' => 'https://netflix.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        // ]);

    }
}
