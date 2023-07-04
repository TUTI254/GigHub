<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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
// common resource routes (naming convention)
// index - show all
// show - show single
// create - show form to create
// store - save to database
// edit - show form to edit
// update - save to database
// destroy/delete - delete from database




// this is a route for the index method for the listing all listings
Route::get('/', [ListingController::class, 'index']);
// this is a route for showing the form to create a new listing
Route::get('/listings/create', [ListingController::class, 'create']);
// this is a route for the store method for the create single listing
Route::post('/listings', [ListingController::class, 'store']);
//this is a route for showing the edit form for the single listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
//this is a route for the update method for the single listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);
//this is a route for the destroy method for the single listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);
//this is a route for the show method for the single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
