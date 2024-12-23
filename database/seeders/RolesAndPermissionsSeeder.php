<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

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

        // Define roles
        $roles = [
            [
                'name' => 'Super-Admin',
            ],
            [
                'name' => 'Editor',
            ],
        ];

       // Resources and their parent permissions
       $resources = [
        'Dashboard' => ['Dashboard Cards', 'Dashboard Charts', 'Dashboard Pie Charts'],
        'Admin' => ['All Admins', 'Create Admin', 'Edit Admin', 'Show Admin', 'Delete Admin'],
        'User' => ['All Users', 'Create User', 'Edit User', 'Show User', 'Delete User'],
        'Role' => ['All Roles', 'Create Role', 'Edit Role', 'Delete Role'],
        'Properties' => ['Index Properties', 'Create Property', 'Edit Property', 'Show Property', 'Delete Property'],
        'Vendors' => ['Index Vendors', 'Create Vendor', 'Edit Vendor', 'Show Vendor', 'Delete Vendor'],
        'House Chores' => ['Index House Chores', 'Create House Chore', 'Edit House Chore', 'Show House Chore', 'Delete House Chore'],
        'Todos' => ['Index Todos', 'Create Todo', 'Edit Todo', 'Show Todo', 'Delete Todo'],
        'Expenses' => ['Index Expenses', 'Create Expense', 'Edit Expense', 'Show Expense', 'Delete Expense'],
    ];

    // Loop through each resource and create permissions
    foreach ($resources as $parent => $permissions) {
        // Insert parent permission
        $parentId = DB::table('permissions')->insertGetId([
            'name' => $parent,
            'guard_name' => 'web',
            'parent_id' => null, // No parent
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Insert child permissions
        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission,
                'guard_name' => 'web',
                'parent_id' => $parentId, // Reference parent ID
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

        // Create roles
        foreach ($roles as $role) {
            Role::create($role);
        }

       

        // Retrieve the "Admin" role
        $adminRole = Role::where('name', 'Super-Admin')->first();

        // Assign the "Admin" role to a user
        // $user = User::create([
        //     'first_name' => 'Admin',
        //     'last_name' => 'User',
        //     'email'             => 'admin@app.com',
        //     'password'          => Hash::make('12345678'),
        //     'type'              => 'admin',
        //     'status'            => 'active',
        //     'phone'             => '+880 1381055093',
        //     'email_verified_at' => \Carbon\Carbon::now(),
        // ]);
        // $user = User::create([
        //     'name' => 'Super Admin',
        //     'email' => 'admin@gmail.com',
        //     'phone'=>'0288716234',
        //     'password' => Hash::make('12345678'), // Use bcrypt to hash password
        // ]);
        $user->assignRole($adminRole);

        // Retrieve all permissions
        $allPermissions = Permission::pluck('id')->toArray();

        // Sync all permissions with the "Admin" role
        $adminRole->syncPermissions($allPermissions);
    }
}
