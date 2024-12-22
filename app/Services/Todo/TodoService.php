<?php

namespace App\Services\Todo;

use App\Models\Todo;

class TodoService
{
    public function getAllTodos()
    {
        return Todo::all();
    }

    public function createTodo(array $data)
    {
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();
        return Todo::create($data);
    }

    public function getTodoById($id)
    {
        return Todo::findOrFail($id);
    }

    public function updateTodo($id, array $data)
    {
        $todo = Todo::findOrFail($id);
        $data['updated_by'] = auth()->id();
        $todo->update($data);
        return $todo;
    }

    public function deleteTodo($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
    }
}