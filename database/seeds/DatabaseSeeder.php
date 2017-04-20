<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlatformTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(GamesTableSeeder::class);
    }
}


class PlatformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert(['fullname' => 'Xbox One', 'shortName' => 'Xbox One']);
        DB::table('platforms')->insert(['fullname' => 'PlayStation 4', 'shortName' => 'Ps4']);
        DB::table('platforms')->insert(['fullname' => 'Nintendo Switch', 'shortName' => 'Switch']);
        DB::table('platforms')->insert(['fullname' => 'Nintendo 3DS', 'shortName' => '3DS']);
        DB::table('platforms')->insert(['fullname' => 'Nintendo WiiU', 'shortName' => 'WiiU']);
        DB::table('platforms')->insert(['fullname' => 'PlayStation 3', 'shortName' => 'Ps3']);
        DB::table('platforms')->insert(['fullname' => 'Xbox 360', 'shortName' => 'Xbox 360']);
        DB::table('platforms')->insert(['fullname' => 'Nintendo Ds', 'shortName' => 'Ds']);
        DB::table('platforms')->insert(['fullname' => 'Xbox', 'shortName' => 'Xbox']);
        DB::table('platforms')->insert(['fullname' => 'PlayStation 2', 'shortName' => 'Ps2']);
        DB::table('platforms')->insert(['fullname' => 'PlayStation One', 'shortName' => 'Ps1']);
        DB::table('platforms')->insert(['fullname' => 'PC', 'shortName' => 'PC']);
        
        
    }
}

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(['name' => 'Shooter']);
        DB::table('genres')->insert(['name' => 'Sports']);
        DB::table('genres')->insert(['name' => 'Fighter']);
        DB::table('genres')->insert(['name' => 'RPG']);
        DB::table('genres')->insert(['name' => 'Simulation']);
        DB::table('genres')->insert(['name' => 'Puzzle']);
        DB::table('genres')->insert(['name' => 'Casual']);
        DB::table('genres')->insert(['name' => 'Stealth']);
        DB::table('genres')->insert(['name' => 'JRPG']);
        DB::table('genres')->insert(['name' => 'Horror']);
    }
}

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert(['name' => 'Resident Evil 2','developer'=>'Capcom','picture' => 'RE2 Image','ageRating' => '18','description' => 'Escape a zombie infested Raccoon City','price' => '9.99','score' => '9','platform_id' => '11', 'genre_id' => '10','user_id' => '1']);
        
        DB::table('games')->insert(['name' => 'Mass Effect Andromeda','developer'=>'Bioware','picture' => 'MEA Image','ageRating' => '12','description' => 'Explore the galaxy with a bunch of poorly animated aliens','price' => '49.99','score' => '7','platform_id' => '1', 'genre_id' => '5','user_id' => '1']);
        
        DB::table('games')->insert(['name' => 'Pokemon Sun','developer'=>'Nintendo','picture' => 'PS Image','ageRating' => '3','description' => 'Catch a sandcastle and take over the world','price' => '49.99','score' => '10','platform_id' => '4', 'genre_id' => '9','user_id' => '2']);
        
        DB::table('games')->insert(['name' => 'Football Manager 2017','developer'=>'Sports Interactive','picture' => 'FM17 Image','ageRating' => '3','description' => 'This game will take over your life!','price' => '39.99','score' => '10','platform_id' => '12', 'genre_id' => '5','user_id' => '1']);
        
        DB::table('games')->insert(['name' => 'The Legend of Zelda Breath of the Wild','developer'=>'Nintendo','picture' => 'ZBW Image','ageRating' => '7','description' => 'The greatest game since sliced bread...unless your Jim Sterling','price' => '49.99','score' => '10','platform_id' => '3', 'genre_id' => '4','user_id' => '2']);
    }
}