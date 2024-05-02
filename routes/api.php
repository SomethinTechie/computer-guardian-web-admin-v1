<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'getUser']);
Route::get('/parcels', [ParcelController::class, 'getParcel']);
Route::post('/auth/register/user', [RegisterController::class, 'registerUser']);
Route::post('/auth/login/user', [RegisterController::class, 'loginUser']);

//Quotes
Route::get('/quotes', [QuoteController::class, 'index']);
Route::post('/quote/create/{user}', [QuoteController::class, 'store']);
Route::get('/quote/{quote}', [QuoteController::class, 'show']);

//user
Route::post('/user/{id}/update', [UserController::class, 'user_update']);

//services
Route::get('/quote/request/form/data', [QuoteController::class, 'formData']);

//services routes
Route::get('/services', [ServiceController::class, 'index']);
Route::post('/service/create', [ServiceController::class, 'store']);
Route::get('/service/{service}', [ServiceController::class, 'show']);
Route::post('/service/{service}/update', [ServiceController::class, 'update']);
Route::post('/service/{service}/delete', [ServiceController::class, 'destroy']);

//branches
Route::get('/branches', [BranchController::class, 'index']);
Route::post('/branch/create', [BranchController::class, 'store']);
Route::get('/branch/{branch}', [BranchController::class, 'show']);
Route::post('/branch/{branch}/update', [BranchController::class, 'update']);
Route::post('/branch/{branch}/delete', [BranchController::class, 'destroy']);

//messages
Route::get('/messages', [MessageController::class, 'index']);
Route::post('/message/create', [MessageController::class, 'store']);
Route::get('/message/{message}', [MessageController::class, 'show']);
Route::post('/message/{message}/update', [MessageController::class, 'update']);
Route::post('/message/{message}/delete', [MessageController::class, 'destroy']);

//supports
Route::get('/supports', [SupportController::class, 'index']);
Route::post('/support/create', [SupportController::class, 'store']);
Route::get('/support/{support}', [SupportController::class, 'show']);
Route::post('/support/{support}/update', [SupportController::class, 'update']);
Route::post('/support/{support}/delete', [SupportController::class, 'destroy']);

//threads
Route::get('/threads', [ThreadController::class, 'index']);
Route::post('/thread/create', [ThreadController::class, 'store']);
Route::get('/thread/{user_id}', [ThreadController::class, 'show']);
Route::post('/thread/{thread}/update', [ThreadController::class, 'update']);
Route::post('/thread/{thread}/delete', [ThreadController::class, 'destroy']);

//repairs
Route::get('/repairs', [RepairController::class, 'index']);
Route::get('/repairs/{user_id}', [RepairController::class, 'user_index']);
Route::post('/repair/create', [RepairController::class, 'store']);
Route::get('/repair/{repair}', [RepairController::class, 'show']);
Route::post('/repair/{repair}/update', [RepairController::class, 'update']);
Route::post('/repair/{repair}/delete', [RepairController::class, 'destroy']);
