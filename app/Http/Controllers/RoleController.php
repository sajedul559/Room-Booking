<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RuleRequestForm;
use Illuminate\Support\Facades\Session;
use App\Services\Models\Role\RoleService;

class RoleController extends Controller
{
    protected $roleService;
    public function __construct()
    {
        $this->roleService = new RoleService();
    }
    public function index()
    {
        $data = $this->roleService->index();
        return view('backend.roles.index', $data);
    }
    public function create()
    {
        $data = $this->roleService->index();
        return view('backend.role_permission.create', $data);
    }
    public function store(RuleRequestForm $request)
    {
        $this->roleService->store($request->payloadsData());
        toaster('Rule Created Successfully');
        return redirect()->back();
    }
    public function edit(int $id)
    {
        $data = $this->roleService->findById($id);
        return response()->json($data);
    }
    public function update(RuleRequestForm $request, $id)
    {
        $this->roleService->update($request->payloadsData(), $id);
        toaster('Rule Info Updated Successfully');
        return redirect()->back();
    }
    public function delete(int $id)
    {
        $order = $this->roleService->deleteById($id);
        toaster('Rule Deleted Successfully');
        return redirect()->back();
    }

}
