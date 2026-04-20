<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BedroomController;
use App\Http\Controllers\BathroomController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AgentDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;

// --------------------
// FRONTEND ROUTES
// --------------------
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('service');
Route::get('/agents', [FrontendController::class, 'agents'])->name('agent');
Route::get('/properties', [FrontendController::class, 'properties'])->name('properties');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');


// --------------------
// ADMIN ROUTES
// --------------------
Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // CRUD
        Route::resource('homes', HomeController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('properties', PropertyController::class);
        Route::resource('agents', AgentController::class);
        Route::resource('users', UserController::class);
        Route::resource('testimonials', TestimonialController::class);

        // -----------------------------
        // BEDROOM ROUTES
        // -----------------------------
        Route::get('/bedrooms/create/{property_id}', [BedroomController::class, 'create'])
            ->name('bedrooms.create');

        Route::post('/bedrooms/store', [BedroomController::class, 'store'])
            ->name('bedrooms.store');

        Route::delete('/bedrooms/{id}', [BedroomController::class, 'destroy'])
            ->name('bedrooms.destroy');


        // -----------------------------
        // BATHROOM ROUTES
        // -----------------------------
        Route::get('/bathrooms/create/{property_id}', [BathroomController::class, 'create'])
            ->name('bathrooms.create');

        Route::post('/bathrooms/store', [BathroomController::class, 'store'])
            ->name('bathrooms.store');

        Route::delete('/bathrooms/{id}', [BathroomController::class, 'destroy'])
            ->name('bathrooms.destroy');


        // -----------------------------
        // CONTACT / MESSAGES
        // -----------------------------
        Route::get('contact', [ContactController::class,'index'])->name('contact.index');
        Route::get('messages/{message}', [ContactController::class,'show'])->name('messages.show');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    });


// --------------------
// AUTH ROUTES
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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';