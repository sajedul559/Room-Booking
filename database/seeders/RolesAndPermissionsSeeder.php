<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Clear permissions and roles from DB
       // Instead of truncate, use delete for safe foreign key handling
        DB::table('role_has_permissions')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('model_has_permissions')->delete();
        DB::table('permissions')->delete();
        DB::table('roles')->delete();

        // Define roles
        $roles = [
            ['name' => 'Super-Admin'],
            ['name' => 'Editor'],
            ['name' => 'Property'],
            ['name' => 'Expense'],
            ['name' => 'Vendor'],
            ['name' => 'Todo'],
            ['name' => 'House Chore'],
            ['name' => 'Booking'],
            ['name' => 'Partner'],
        ];

        // Define permissions and their parent relationships
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
            'Reviews' => ['Index Reviews', 'Create Review', 'Edit Review', 'Show Review', 'Delete Review'],
        ];

        // Create permissions
        foreach ($resources as $parent => $permissions) {
            $parentId = DB::table('permissions')->insertGetId([
                'name' => $parent,
                'guard_name' => 'web',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($permissions as $permission) {
                DB::table('permissions')->insert([
                    'name' => $permission,
                    'guard_name' => 'web',
                    'parent_id' => $parentId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Create roles
        foreach ($roles as $role) {
            Role::create($role);
        }

        // Assign Super-Admin role and all permissions to a specific user
        $adminRole = Role::where('name', 'Super-Admin')->first();
        $user = User::where('email', 'superadmin@gmail.com')->first();

        if ($user && $adminRole) {
            $user->assignRole($adminRole);
        }

        // Assign all permissions to Super-Admin
        $allPermissions = Permission::pluck('id')->toArray();
        $adminRole->syncPermissions($allPermissions);
    }
}
