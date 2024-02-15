<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\ManagerPanel\ManagerController;
use App\Http\Controllers\NormalPanel\NormalController;
use App\Http\Controllers\TournamentManagerController;
use App\Http\Controllers\CompetitionListController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContestantController;
use App\Http\Controllers\CompetitionProgramController;


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



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});


Route::get('/list/contestants/table', [TeamController::class, 'index'])->name('contestants');
Route::get('/description/contestants/detail/{id}', [TeamController::class, 'detailShow'])->name('competition.detail');
Route::get('/grid/teams/list/{id}', [ContestantController::class, 'indexID'])->name('team_grid');
Route::get('/team/detail/{id}', [ContestantController::class, 'detailTeamShow'])->name('team_detail');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('normal/home', [NormalController::class, 'index'])->name('normal.home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/register/contestants', TeamController::class);
    Route::get('/register/contestants/create/{id}', [TeamController::class, 'createTeam'])->name('competition.createTeam');
    Route::post('/register/contestants/storeData/{id}', [TeamController::class, 'storeData'])->name('competition.storeData');
    Route::resource('grid/teams', ContestantController::class);
     
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('admin/list_tournament_managers_name', [TournamentManagerController::class, 'show'])->name('list_tmg');
    Route::get('admin/update_confirm_tournament_managers_permission/{id}', [TournamentManagerController::class, 'update_confirm'])->name('update_confirm_tmg');
    Route::get('admin/update_cancel_tournament_managers_permission/{id}', [TournamentManagerController::class, 'update_cancel'])->name('update_cancel_tmg');
});

Route::middleware(['auth','role:manager'])->group(function () {
    Route::get('manager/home', [ManagerController::class, 'index'])->name('manager.home');
    Route::resource('/managers_competition', CompetitionListController::class);
    Route::get('/competition_program/{id}', [CompetitionProgramController::class, 'index'])->name('competition_program');
    Route::get('/competition_program/show/{id}', [CompetitionProgramController::class, 'showProgram'])->name('show_competition_program');
    Route::get('/competition_program/edit/{id}', [CompetitionProgramController::class, 'edit'])->name('edit_competition_program');
    Route::patch('/competition_program/update/{id}', [CompetitionProgramController::class, 'update'])->name('update_competition_program');
});

Route::middleware('auth')->group(function () {
    // Route::get('normal/register-manager', [TournamentManagerController::class, 'create'])->name('tmg');
    // Route::post('normal/register-store', [TournamentManagerController::class, 'store'])->name('register_store');
    Route::resource('/managerRegister', TournamentManagerController::class);
    Route::get('/success', function(){
        return view('/managerRegister/alert')->name('alert');
    });
});
    
// });