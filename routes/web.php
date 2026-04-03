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
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AgentDashboardController; // ✅ Controller mpya kwa Agent dashboard
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
// Agent Routes (login dashboard & CRUD properties)
// --------------------
Route::middleware(['auth','role:Agent'])->prefix('agent')->name('agent.')->group(function() {
    // Dashboard for Agent (private dashboard)
    Route::get('/dashboard', [AgentDashboardController::class, 'index'])->name('dashboard');

    // CRUD properties for Agent
    Route::resource('properties', PropertyController::class);
});

// --------------------
// Admin Routes
// --------------------
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // CRUD Routes
    Route::resource('homes', HomeController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('agents', AgentController::class); // Admin manages agents
    Route::resource('users', UserController::class);
    Route::resource('testimonials', TestimonialController::class);

    // Contact
    Route::get('contact', [ContactController::class,'index'])->name('contact.index');

    // Messages delete
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

// --------------------
// Authenticated Users Routes
// --------------------
Route::middleware(['auth'])->group(function () {
    // Fallback dashboard route if role not used
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'Agent') {
            return redirect()->route('agent.dashboard');
        }
        return redirect('/'); // fallback
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';