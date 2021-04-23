<?php

use Illuminate\Support\Facades\Route;

use App\Models\Project;

use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('projects', function () {
    $projects = Project::all();
    return view('welcome', compact('projects'));
});

Route::get('projects/{slug}', function ($slug) {
    $project = Project::find($slug);
    return view('project', compact('project'));
})->name('project');
