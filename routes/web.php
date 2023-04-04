<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CustomerController::class, 'index'])->middleware('auth');

Route::get('/addCustomer', [CustomerController::class, 'addCustomer'])->middleware('auth');
Route::post("/saveCustomer", [CustomerController::class, "saveCustomer"])->middleware('auth');
Route::get("/edit/{id}", [CustomerController::class, "edit"])->middleware('auth');
Route::post("updateCustomer", [CustomerController::class, "updateCustomer"])->middleware('auth');
Route::get("/delete/{id}", [CustomerController::class, "delete"])->middleware("auth");

Route::get("/register", [UserController::class, 'register']);
Route::post("/store", [UserController::class, 'store']);
Route::get("/users", [UserController::class, 'show'])->middleware('auth');
Route::get("/login", [UserController::class, "login"])->name('login')->middleware('guest');
Route::post("/login/process", [UserController::class, "authenticate"]);
Route::get("/logout", [UserController::class, "logout"]);
Route::get("/user/delete/{id}", [UserController::class, "userDelete"])->middleware('auth');


Route::get("/products", [ProductController::class, "showProduct"]);
Route::get("/products/add-product", [ProductController::class, "addProduct"]);
Route::post("/products/add/", [ProductController::class, "postProduct"]);
Route::get("/products/delete-product/{id}", [ProductController::class, "deleteProduct"]);
Route::get("/products/edit-product/{id}", [ProductController::class, "editProduct"]);
Route::post("/products/edit", [ProductController::class, "updateProduct"]);