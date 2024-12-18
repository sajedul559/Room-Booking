<?php

namespace App\Services\Models\Role;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;



Class RoleService {

    public function index():array
    {
        $data = [];
        $data['roles'] = $this->getAll();
        return $data;
    }
    public function getAll($isActive = false, $isVisible = false, $isPaginate = false)
    {
        // $roles = Role::when($isActive, function($q) use($isActive){
        //     $q->where('is_active', $isActive);
        // })->when($isVisible, function($q) use($isVisible){
        //     $q->where('is_visible', $isVisible);
        // })->get();
        $roles = Role::all();
        return $roles;
    }
    public function store(array $payloads)
    {
        // dd($payloads);
        Role::create($payloads);
    }
    public function update($payloads, $id)
    {
       $model = $this->findById($id);
       $model->update($payloads);
    }
    public function findById(int $id, $conditions = [], $with = [])
    {
        return Role::where('id', $id)->first();
    }
    public function deleteById(int $id)
    {
        $model = $this->findById($id);
        if($model) {
            return $model->delete();
        }
        return false;
    }

    public function roleList()
    {
        return Role::all();
    }
    public function assignPermissions($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermission = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        $rolePermissions = array_values($rolePermission);

        return $data = [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ];
    }
}