<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        
        Role::create(['name' => 'personal']);
        Role::create(['name' => 'admin']);
        $user = factory(\App\User::class)->create([
            'name' => 'Personal',
            'email' => 'personal1@gmail.com',
            'password' => 'personal1'
        ]);

        $user->assignRole('personal');

        $admin = factory(\App\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin1'
        ]);

        $admin->assignRole('admin');
    }
}
