<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterWargaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/register-warga", [RegisterWargaController::class, 'store'])->name('register-warga.store');

Route::get('/register-warga', function () {
    $daftarDesa = DB::table('desa')->get();
    return view('auth.register-warga', [
        'daftarDesa' => $daftarDesa,
    ]);
})->name('register-warga');

Route::get('/dashboard', function () {
    $id_desa = auth()->user()->id_desa;

    $anggotaDesa = DB::table('users')->where('id_desa', $id_desa)->get();

    return view('dashboard', [
        'anggotaDesa' => $anggotaDesa,
    ]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/groups/{id}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::put('/groups/{id}', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('/groups/{id}', [GroupController::class, 'destroy'])->name('groups.destroy');

    Route::get('/groups/{id}/chats', [GroupController::class, 'chat'])->name('chats.index');
    Route::get('/groups/{id}/members', [GroupController::class, 'members'])->name('groups.members');

    // join
    Route::post('/groups/{id}/join', [GroupController::class, 'join'])->name('groups.join');
    Route::post('/groups/{id}/leave', [GroupController::class, 'leave'])->name('groups.leave');
    Route::post('/groups/{id}/members/{memberId}/confirm', [GroupController::class, 'confirm'])->name('groups.members.confirm');
    Route::post('/groups/{id}/members/{memberId}/delete', [GroupController::class, 'delete'])->name('groups.members.delete');

    Route::post('/groups/{id}/reject', [GroupController::class, 'reject'])->name('groups.reject');
    Route::post('/groups/{id}/cancel', [GroupController::class, 'cancel'])->name('groups.cancel');
});

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/{id}/confirm', [UserController::class, 'confirm'])->name('users.confirm');
});

require __DIR__ . '/auth.php';
