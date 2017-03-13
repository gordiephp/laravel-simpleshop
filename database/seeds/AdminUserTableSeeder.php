<?php

use Illuminate\Database\Seeder;
use App\AdminUser;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new AdminUser;
        $user->name = 'admin';
        $user->email = 'admin@simpleshop.pl';
        $user->password = bcrypt('admin');
        $user->save();
    }
}
