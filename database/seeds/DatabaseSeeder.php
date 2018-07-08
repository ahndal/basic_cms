<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => '관리자',
            'is_admin' => 'Y',
            'is_default' => 'N',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => '회원',
            'is_admin' => 'N',
            'is_default' => 'Y',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'gogole',
            'email' => 'ajs0904@gmail.com',
            'password' => bcrypt('pass'),
            'visited_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        for($loop = 0; $loop<20; $loop++)
        {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('pass'),
                'visited_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }


        $default_role = Role::where('is_default','Y')->firstOrFail();

        if($default_role)
        {
            $users = User::All();

            foreach($users as $user)
            {
                $user->roles()->attach($default_role);
            }
        }
    }
}
