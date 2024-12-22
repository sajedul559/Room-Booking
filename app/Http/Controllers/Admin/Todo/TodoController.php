<?php

namespace App\Http\Controllers\Admin\Todo;

use App\Models\Todo;
use Illuminate\Http\Request;

use App\Services\Todo\TodoService;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoFormRequest;
use App\Services\Vendor\VendorService;

class TodoController extends Controller
{
    protected $todoService;
    protected $vendorService;


    public function __construct(TodoService $todoService, VendorService $vendorService)
    {
        $this->todoService = $todoService;
        $this->vendorService = $vendorService;

    }


    public function index()
    {
        $todos = $this->todoService->getAllTodos();
        return view('backend.todos.list', compact('todos'));
    }

    public function create()
    {
        $vendors = $this->vendorService->getAllVendors();
        return view('backend.todos.create',compact('vendors'));
    }

    public function store(TodoFormRequest $request)
    {
        $this->todoService->createTodo($request->payloadsData());
        return redirect()->route('todos.index')->with('success', 'TODO created successfully.');
    }

    public function edit($id)
    {
        $todo = $this->todoService->getTodoById($id);
        $vendors = $this->vendorService->getAllVendors();

        return view('backend.todos.edit', compact('todo','vendors'));
    }

    public function update(TodoFormRequest $request, $id)
    {
        $this->todoService->updateTodo($id, $request->payloadsData());
        return redirect()->route('todos.index')->with('success', 'TODO updated successfully.');
    }

    public function destroy($id)
    {
        $this->todoService->deleteTodo($id);
        return redirect()->route('todos.index')->with('success', 'TODO deleted successfully.');
    }
}