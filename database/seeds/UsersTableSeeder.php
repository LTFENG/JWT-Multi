<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new User();
        $user->name='JK_USER';
        $user->email='jkuser@test.com';
        $user->password=bcrypt('secret');
        $user->gender=1;
        $user->birthday='1992-05-04';
        $user->location_long=103.613838;
        $user->location_lat=1.531185;
        $user->payment_method='Cash_On_Delivery';
        $user->races='Chinese';
        $user->avatar='localhost/jk-laravel-jkfoodease-testc/public/defaults/avatars/male.png';
        $user->slug='jk-user';
        $user->telephone='0167488864';
        $user->save();
    
    }
}
