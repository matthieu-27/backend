<?php

use App\Http\Controllers\API\FolderController;
use App\Http\Controllers\API\RegisterController;
use App\Models\Folder;
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
Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
	return $request->user();
});

Route::controller(RegisterController::class)->group(function () {
	Route::post("register", "register");
	Route::post("login", "login");
});

Route::middleware("auth:sanctum")->group(function () {
	Route::apiresource("folders", FolderController::class);
	// Route::get("test", function () {
	// 	$f = Folder::findOrFail(2);
	// 	$f2 = new Folder();
	// 	$f2->name = "test3";
	// 	$f2->user_id = 2;
	// 	$f->foldersin()->save($f2);
	// });
});