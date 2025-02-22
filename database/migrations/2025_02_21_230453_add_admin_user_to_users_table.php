<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddAdminUserToUsersTable extends Migration
{
    public function up()
    {
        // Add the admin user to the users table
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'), // Make sure to hash the password
            'role' => 'admin', // Assuming you have a 'role' column
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        // Remove the admin user in case of rollback
        DB::table('users')->where('email', 'admin@example.com')->delete();
    }
}
