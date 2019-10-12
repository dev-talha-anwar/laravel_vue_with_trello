<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
    	$admin->name = 'Super Admin';
    	$admin->email = 'admin@site.com';
    	$admin->email_verified_at = now();
    	$admin->password = bcrypt('admin123');
       	$admin->save();
        $admin->assignRole("Super Admin");
    }
}
