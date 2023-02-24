<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::with("category")->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'body' => $request->body,
            'cate_id' => $request->cate_id
        ]);
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update([
            'title' => $request->title,
            'body' => $request->body,
            'done' => $request->done,
            'cate_id' => $request->cate_id
        ]);
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return ['massage' => 'yr task has been removed'];
    }
    public function getTaskByCategory(Category $category)
    {
        return $category->task()->with("category")->paginate(10);
    }
    public function getTaskOrderBy($column, $direction)
    {
        return Task::with('category')->orderBy($column, $direction);
    }
    public function getTaskByTerm($term)
    {
        $tasks = Task::with('category')
            ->where('title', 'like', '%' . $term . '%')
            ->orWhere('body', 'like', '%' . $term . '%')
            ->orWhere('id', 'like', '%' . $term . '%')->paginate(10);


        return $tasks;
    }
}
