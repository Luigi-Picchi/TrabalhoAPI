<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#Criando uma nova Task
Route::post("/cria-task",[TaskController::class, "store"]);


#Puxando a tarefa pelo id
Route::get("/index/{id}", [TaskController::class, "index"]);
#Captura todas as Tasks
Route::get("/show", [TaskController::class, "show"]);


#Atualizar Tasks
Route::patch("/atualiza/{id}", [TaskController::class, "edit"]);


#Deletando uma Task
Route::delete("/deleta-task/{id}", [TaskController::class, "destroy"]);
