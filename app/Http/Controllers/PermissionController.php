<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequestForm;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionService;
    public function __construct()
    {
        $this->permissionService = new PermissionService();
    }
    public function index()
    {
        $data = $this->permissionService->index();
        return view('permissions.index', $data);
    }
    public function store(PermissionRequestForm $request)
    {
        $this->permissionService->store($request->validated());
        return redirect()->back();
    }
    public function edit(int $id)
    {
        $data['editDepartment'] = $this->permissionService->findById($id);
        $data += $this->permissionService->index();
        return view('permissions.index', $data);
    }
    public function update(PermissionRequestForm $request, $id)
    {
        $this->permissionService->update($request->validated(), $id);
        return redirect()->route('permissions.index');
    }
    public function show(int $id)
    {
        $data = $this->permissionService->findById($id);
    }
    public function delete(int $id)
    {
        $data = $this->permissionService->deleteById($id);
        return redirect()->route('permissions.index');
    }
}
