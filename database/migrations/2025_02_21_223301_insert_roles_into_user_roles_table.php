<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertRolesIntoUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert default roles into the user_roles table
        DB::table('user_roles')->insert([
            ['role_name' => 'admin'],
            ['role_name' => 'student'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Optionally, you can delete the roles inserted during the migration
        DB::table('user_roles')
            ->whereIn('role_name', ['admin', 'student'])
            ->delete();
    }
}
