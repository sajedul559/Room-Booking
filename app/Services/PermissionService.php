<?php

namespace App\Services;

use App\Models\Permission;


class PermissionService {
    public function index():array
    {
        $data = [];
        $data['routes'] = $this->getAll();
        $data['parent_routes'] = Permission::whereNull('parent_id')->get();
        return $data;
    }
    public function getAll($isActive = false, $isPaginate = false)
    {
        $lab_categories = Permission::when($isActive, function($q) use($isActive){
            $q->where('is_active', $isActive);
        })->get();
        return $lab_categories;
    }
    public function store(array $payloads)
    {
        Permission::create($payloads);
    }
    public function update($payloads, $id)
    {
       $model = $this->findById($id);
       $model->update($payloads);
    }
    public function findById(int $id, $conditions = [], $with = [])
    {
        return Permission::where('id', $id)->first();
    }
    public function deleteById(int $id)
    {
        $model = $this->findById($id);
        if($model) {
            return $model->delete();
        }
        return false;
    }
}