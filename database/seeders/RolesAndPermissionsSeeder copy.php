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
            [
                'name' => 'Property',
            ],
            [
                'name' => 'Expense',
            ],
            [
                'name' => 'Vendor',
            ],
            [
                'name' => 'Todo',
            ],
            [
                'name' => 'House Chore',
            ],
            [
                'name' => 'Booking',
            ],
            [
                'name' => 'Partner',
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
        'Bookings' => ['Index Bookings', 'Create Booking', 'Edit Booking', 'Show Booking', 'Delete Booking'],
        'Partners' => ['Index Partners', 'Create Partner', 'Edit Partner', 'Show Partner', 'Delete Partner'],
        'Rooms' => ['Index Rooms', 'Create Room', 'Edit Room', 'Show Room', 'Delete Room'],
        'RentManagements' => ['Index RentManagements', 'Create RentManagement', 'Edit RentManagement', 'Show RentManagement', 'Delete RentManagement'],
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
        $user = User::where("email",'superadmin@gmail.com')->first();
        $user->assignRole($adminRole);

        // Retrieve all permissions
        $allPermissions = Permission::pluck('id')->toArray();

        // Sync all permissions with the "Admin" role
        $adminRole->syncPermissions($allPermissions);
    }
}
