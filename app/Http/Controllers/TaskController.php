<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return response()->json($tasks);
    }

    // CREATE
    public function store(Request $request){
        $task = new Task();
        $task->task = $request->task;
        
        if(!empty($task)){
            $task->save();
            return response()->json([
                "message" => "Nouvelle tâche ajoutée avec succès"
            ], 201);

        } else {
            return response->json([
                "message" => "impossible d'ajouter la tâche"
            ], 403);
        }
    }

    // READ
    public function show($id){
        $task = Task::find($id);

        if(!empty($task)){
            return response()->json($task);
        } else {
            return response()->json([
                "message" => "Tâche introuvable/inexistante"
            ], 404);
        }
    }

    // UPDATE
    public function update(Request $request, $id){

        if(Task::where('id', $id)->exists()){
            $task = Task::find($id);

            $task->task = is_null($request->task) ? $task->task : $request->task;
            $task->save();

            return response()->json([
                "message" => "Tâche mise à jour"
            ], 201);
        } else {
            return response()->json([
                "message" => "Tâche introuvable/inexistante"
            ], 404);
        }
    }

    // DELETE
    public function destroy($id){

        if(Task::where('id', $id)->exists()){
            $task = Task::find($id);
            $task->destroy();

            return response()->json([
                "message" => "Tâche supprimée"
            ], 201);
        } else {
            return response()->json([
                "message" => "Tâche introuvable/inexistante"
            ], 404);
        }
    }
}
