<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // 
        $usernames = [
            'junsan',
            'eri',
            'kanako',
            'tomotaka',
            'yuichiro',
            'yu',
            'nami',
            'saya',
            'yuji',
            'naomichi',
            'arisa',
            'saki',
            'shoji',
            'rina',
            'takuya',
            'miyu',
            'emi',
            'elena',
            'izumi',

        ];
        foreach($usernames as $username){
            $db = new Carbon();
             DB::table('users')->insert([
            'username' => $username.rand(0,9).rand(0,9).rand(0,9).rand(0,9),
            'email' => $username.'@gmail.com',
            'password' => Hash::make('1234'),
            'email_verified_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        }
        
    }
}
