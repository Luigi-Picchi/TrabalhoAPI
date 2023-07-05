<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
        $task = task::find($id);
        if(!$task){
            return "inexistente";
        }
        return $task
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
    public function store(StoretaskRequest $request)
    {
        //
         $task = new task;

        $task->title = $request->input("title");
        $task->descricao = $request->input("descricao");

        if($request->input("status")== "Completo" || $request->input("status") == "Incompleto"){

            $tarefa->status = $request->input("status");
            $tarefa->save();
            return "Cadastrado.";

        }
        else{
            return "Status Invalido, colocar completo ou incompleto";

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        //
         $task = task::all();
        if(!$task){
            return "inexistente";
        }
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoretaskRequest $request)
    {
        //
        $task = task::find($id);


        $task->title = $request->input("title");
        $task->descricao = $request->input("descricao");
        if($request->input("status")== "Completo" || $request->input("status") == "Incompleto"){

            $task->status = $request->Input("status");

            $task->save();
            return "Alterado.";

        }
        else{
            return "Status Invalido, colocar completo ou incompleto";

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetaskRequest $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $destroy = tarefa::find($id);
        $destroy->delete();
    }
}
