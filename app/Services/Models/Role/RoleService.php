<?php

namespace App\Services\Models\Role;

use Spatie\Permission\Models\Role;


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
}