<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('service');
Route::get('/agents', [FrontendController::class, 'agents'])->name('agent');
Route::get('/properties', [FrontendController::class, 'properties'])->name('properties');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');


use App\Http\Middleware\AdminMiddleware;
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');


    // Homes CRUD
    Route::get('/admin/homes', [HomeController::class, 'index'])->name('homes.index');
    Route::get('/admin/homes/create', [HomeController::class, 'create'])->name('homes.create');
    Route::post('/admin/homes', [HomeController::class, 'store'])->name('homes.store');
    Route::get('/admin/homes/{home}/edit', [HomeController::class, 'edit'])->name('homes.edit');
    Route::put('/admin/homes/{home}', [HomeController::class, 'update'])->name('homes.update');
    Route::delete('/admin/homes/{home}', [HomeController::class, 'destroy'])->name('homes.destroy');

    // Services CRUD
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/admin/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // Properties CRUD
    Route::get('/admin/properties', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('/admin/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/admin/properties', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/admin/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/admin/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/admin/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

    // Agents CRUD
    Route::get('/admin/agents', [AgentController::class, 'index'])->name('agents.index');
    Route::get('/admin/agents/create', [AgentController::class, 'create'])->name('agents.create');
    Route::post('/admin/agents', [AgentController::class, 'store'])->name('agents.store');
    Route::get('/admin/agents/{agent}/edit', [AgentController::class, 'edit'])->name('agents.edit');
    Route::put('/admin/agents/{agent}', [AgentController::class, 'update'])->name('agents.update');
    Route::delete('/admin/agents/{agent}', [AgentController::class, 'destroy'])->name('agents.destroy');

     // Users CRUD
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
