<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon;
use App\Model\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'junsan14';
        $user->email = 'junsan14@gmail.com';
        $user->status = '在職';
        $user->email_verified_at = new Carbon();
        $user->save();
        
    }
}
