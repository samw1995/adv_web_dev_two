<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert(['name' => 'Resident Evil 2','picture' => 'RE2 Image','ageRating' => '18','description' => 'Escape a zombie infested Raccoon City','price' => '9.99','score' => '9']);
        
        DB::table('games')->insert(['name' => 'Mass Effect Andromeda','picture' => 'MEA Image','ageRating' => '12','description' => 'Explore the galaxy with a bunch of poorly animated aliens','price' => '49.99','score' => '7']);
        
        DB::table('games')->insert(['name' => 'Pokemon Sun','picture' => 'PS Image','ageRating' => '3','description' => 'Catch a sandcastle and take over the world','price' => '49.99','score' => '10']);
        
        DB::table('games')->insert(['name' => 'Football Manager 2017','picture' => 'FM17 Image','ageRating' => '3','description' => 'This game will take over your life!','price' => '39.99','score' => '10']);
        
        DB::table('games')->insert(['name' => 'The Legend of Zelda Breath of the Wild','picture' => 'ZBW Image','ageRating' => '7','description' => 'The greatest game since sliced bread...unless your Jim Sterling','price' => '49.99','score' => '10']);
    }
}

