<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Membuat role admin
		$adminRole = new Role();
		$adminRole->name = "admin";
		$adminRole->display_name = "Admin";
		$adminRole->save();
		// Membuat role member
		$memberRole = new Role();
		$memberRole->name = "member";
		$memberRole->display_name = "Member";
		$memberRole->save();
		
		$admin = new User();
        $admin->name = 'Admin Parkir Online';
        $admin->email = 'parkirsonline@gmail.com';
        $admin->password = bcrypt('parkironline');
        $admin->is_verified = 1;
        $admin->save();
        $admin->attachRole($adminRole);

        // Membuat sample member
        $member = new User();
        $member->name = "Krisst";
        $member->email = 'krisst111295@gmail.com';
        $member->password = bcrypt('rahasia');
        $member->is_verified = 1;
        $member->save();
        $member->attachRole($memberRole);
        // Membuat sample member
        $member1 = new User();
        $member1->name = "Tama Krisst";
        $member1->email = 'tamakrisst1112@gmail.com';
        $member1->password = bcrypt('rahasia');
        $member1->is_verified = 1;
        $member1->save();
        $member1->attachRole($memberRole);
		
    }
}
