<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\QuestionController;
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

// crud category

Route::get('/categories', [CategoryController::class,'index']);
Route::get('/categories/{id}', [CategoryController::class,'show']);
Route::post('/categories', [CategoryController::class,'store']);
Route::put('/categories/{id}', [CategoryController::class,'update']);
Route::delete('/categories/{id}', [CategoryController::class,'destroy']);

// crud competence
Route::get('/competences', [CompetenceController::class,'index']);
Route::get('/competences/{id}', [CompetenceController::class,'show']);
Route::post('/competences', [CompetenceController::class,'store']);
Route::put('/competences/{id}', [CompetenceController::class,'update']);
Route::delete('/competences/{id}', [CompetenceController::class,'destroy']);


// crud action
Route::get('/actions', [ActionController::class,'index']);
Route::get('/actions/{id}', [ActionController::class,'show']);
Route::post('/actions', [ActionController::class,'store']);
Route::put('/actions/{id}', [ActionController::class,'update']);
Route::delete('/actions/{id}', [ActionController::class,'destroy']);

// crud question
Route::get('/questions', [QuestionController::class,'index']);
Route::get('/questions/{id}', [QuestionController::class,'show']);
Route::post('/questions', [QuestionController::class,'store']);
Route::put('/questions/{id}', [QuestionController::class,'update']);
Route::delete('/questions/{id}', [QuestionController::class,'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
