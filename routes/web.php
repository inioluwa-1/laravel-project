<?php

// use GuzzleHttp\Psr7\Request;

use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// $name = "Arogungbogunmi";
// $school = "Lagos State University";
// $username = "iyanutisele";
    // //methods
    // // with method
    // // return view('home')-> with('name', $name)-> with('school', $school);

    // // //compatible method
    // // return view('home', compact('name', 'school', 'username'));
    
    // return view('home', [
        //     'name' => $name,
        //     'school' => $school,
        //     'username' => $username
        // ]);
        
        
Route::get('/home', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'createUser']);
Route::get('/login', [UserController::class, 'loginUser']);
Route::post('/login', [UserController::class, 'loginAccount']);
Route::get('/dashboard', [UserController::class, 'Dashboard']);
Route::post('/deleteuser', [UserController::class, 'deleteuser']);
Route::get('/dashboard/{id}', [UserController::class, 'edituser']);
Route::post('/dashboard/{id}', [UserController::class, 'edituser']);
Route::get('/forgot', [UserController::class, 'forgotpass']);
Route::post('/forgot', [UserController::class, 'forgot']);
Route::get('/forgotpassword', [UserController::class, 'forgotpassword'])->name('verifypassword');
Route::post('/forgotpassword', [UserController::class, 'verifypass']);
Route::get('/allusers', [UserController::class, 'allusers']);
Route::get('/admin', [UserController::class, 'admin']);
Route::get('/checklist/{id}', [UserController::class, 'checklist']);
Route::get('/picture/{id}',  function ( $id) {
    return view('profilepicture', compact('id'));
});
Route::post('/picture/{id}', [UserController::class, 'uploadpicture']);




Route::get('/notes', [NoteController::class, 'notesPage']);
Route::post('/createNote', [NoteController::class, 'createNote']);
Route::get('/editNote/{id}', [NoteController::class, 'editNote']);
Route::post('/updateNote/{id}', [NoteController::class, 'updateNote']);
Route::get('/deleteNote/{id}', [NoteController::class, 'deleteNote']);

