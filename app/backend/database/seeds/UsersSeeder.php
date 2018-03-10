<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'godtoy',
            'email' => 'zhaojunlike@gmail.com',
            'password' => Hash::make('zhaojun'),
            'access_token' => '',
            'nickname' => '',
            'website' => '',
            'aliens' => [],//绑定第三方
            'birthday' => '',
            'avatar_url' => '',
            'location' => '',
            '_invite_uid' => '',
            'status' => 1
        ]);
    }
}
