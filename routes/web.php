<?php

use App\Models\Autor;
use App\Models\Conta;
use App\Models\Livro;
use App\Models\Usuario;
use App\Models\Emprestimo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\SoAdministradores;

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

Route::get('/', [App\Http\Controllers\SiteController::class, 'index']);
// Route::get('/login', [SiteController::class, 'login']);
// Route::post('/auth', [SiteController::class, 'auth']);
Route::resource('usuarios', 'App\Http\Controllers\UsuarioController');
// Route::get('/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create']);
Route::resource('livros', 'App\Http\Controllers\LivroController');
Route::post('/livros/{livro}/aumentar', [App\Http\Controllers\LivroController::class, 'aumentar']); //->middleware(SoAdministradores::class);
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
// Auth::routes();
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/teste', function () {
  // $data = Usuario::find(2);
  $data = Usuario::find(2);
  // dd(strlen('Strings'));
});
Route::get('/emprestimos', [App\Http\Controllers\EmprestimoController::class, 'emprestimos'])->middleware('auth');
Route::post('/emprestimos/{emprestimo}', [App\Http\Controllers\EmprestimoController::class, 'create'])->middleware('auth');
Route::post('/aprovar/{emprestimo}', [App\Http\Controllers\EmprestimoController::class, 'aprovarEmprestimo'])->middleware('auth');
Route::post('/rejeitar/{emprestimo}', [App\Http\Controllers\EmprestimoController::class, 'rejeitarEmprestimo'])->middleware('auth');
Route::delete('/emprestimos/{emprestimo}', [App\Http\Controllers\EmprestimoController::class, 'destroy'])->middleware('auth');
Route::post('/devolver/{emprestimo}', [App\Http\Controllers\EmprestimoController::class, 'devolver'])->middleware('auth');
