<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '疯狂大东丶',
            'email' => 'crazy_dadong@outlook.com',
            'password' => bcrypt('0546GRD.wsfkdd'),
            'is_admin' => 1,
            'is_disabled' => 0,
            'created_at' => date('Y-m-d H:i:s', time()-(3600*24)*30),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        factory('App\Data\User', 999)->create();

    }
}
