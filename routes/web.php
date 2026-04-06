<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BedroomController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AgentDashboardController;
use App\Http\Middleware\AdminMiddleware;

// --------------------
// Frontend Routes
// --------------------
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('service');
Route::get('/agents', [FrontendController::class, 'agents'])->name('agent');
Route::get('/properties', [FrontendController::class, 'properties'])->name('properties');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

// --------------------
// Admin Routes (Agent Dashboard & CRUD properties)
// --------------------
Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function() {
    // Dashboard for admin (private dashboard)
    Route::get('/dashboard', [AgentDashboardController::class, 'index'])->name('dashboard');

    // CRUD properties for admin
    Route::resource('properties', PropertyController::class);
});

// --------------------
// Admin Routes (Full Admin)
// --------------------
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // CRUD Routes
    Route::resource('homes', HomeController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('agents', AgentController::class);
    Route::resource('users', UserController::class);
    Route::resource('testimonials', TestimonialController::class);

    // -----------------------------
    // Bedroom Routes
    // -----------------------------
    // Create bedroom form
    Route::get('/bedroom/create/{property_id}', [BedroomController::class, 'create'])->name('bedroom.create');

    // Store bedroom
    Route::post('/bedroom/store', [BedroomController::class, 'store'])->name('bedroom.store');

    // Contact / Messages
    Route::get('contact', [ContactController::class,'index'])->name('contact.index');
    Route::get('messages/{message}', [ContactController::class,'show'])->name('messages.show');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

// --------------------
// Authenticated Users Routes
// --------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'Agent') {
            return redirect()->route('agent.dashboard');
        }
        return redirect('/');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';