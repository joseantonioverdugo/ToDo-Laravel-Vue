<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $tasks = Tasks::all();

        if($tasks){
            return response()->json([
                'success' => true,
                'message' => 'Tasks Found',
                'data' => $tasks
            ], 200);
         }else{
            return response()->json([
            'success' => false,
            'message' => 'Tasks Not Found',
            'data' => ''
            ], 404);
    }
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
    public function store(Request $request)
    {
        $inputs = $request -> input();
        $task = Task::create($inputs);
        if($task){
            return response()->json([
                'success' => true,
                'message' => 'Task Created',
                'data' => $task
            ], 200);
         }else{
            return response()->json([
            'success' => false,
            'message' => 'Task Not Created',
            'data' => ''
            ], 404);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $task = Tasks::find($id);
        if($task){
            return response()->json([
                'success' => true,
                'message' => 'User Found',
                'data' => $task
            ], 200);
         }else{
            return response()->json([
            'success' => false,
            'message' => 'User Not Found',
            'data' => ''
            ], 404);
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inputs = $request -> input();
        $task = Tasks::find($id);
        $task->update($inputs);
        if($task){
            return response()->json([
                'success' => true,
                'message' => 'Task Updated',
                'data' => $task
            ], 200);
         }else{
            return response()->json([
            'success' => false,
            'message' => 'Task Not Updated',
            'data' => ''
            ], 404);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $task = Tasks::find($id);
        $task->delete();
        if($task){
            return response()->json([
                'success' => true,
                'message' => 'Task Deleted',
                'data' => $task
            ], 200);
         }else{
            return response()->json([
            'success' => false,
            'message' => 'Task Not Deleted',
            'data' => ''
            ], 404);
    }
}
}
