<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        $admin = User::updateOrCreate(
            ['email' => 'admin@naviport.test'],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('admin123'), // Change this securely later
            ]
        );

        // Create role
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Create permissions
        $permissions = [
            'access dashboard',
            'manage cargos',
            'manage shipments',
            'manage users',
            'manage clients',
            'manage ports',
            'manage crews',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Assign all permissions to role
        $role->syncPermissions(Permission::all());

        // Assign role to user
        $admin->assignRole($role);
    }
}

