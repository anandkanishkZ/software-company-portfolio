<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\EventController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/industries', [IndustriesController::class, 'index'])->name('industries');
Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('testimonials');
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
Route::get('/articles/{article:slug}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/reviews', [TestimonialsController::class, 'store'])->name('reviews.store')->middleware('throttle:5,10');
Route::post('/chatbot', [ChatbotController::class, 'chat'])->name('chatbot')->middleware('throttle:30,1');

// Admin auth routes (no middleware)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/inquiries', [DashboardController::class, 'inquiries'])->name('inquiries');
        Route::patch('/inquiries/{contact}/read', [DashboardController::class, 'markRead'])->name('inquiries.read');

        // Testimonials CRUD
        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

        // Articles CRUD
        Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
        Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

        // Services CRUD
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

        // Industries CRUD
        Route::get('/industries', [IndustryController::class, 'index'])->name('industries.index');
        Route::get('/industries/create', [IndustryController::class, 'create'])->name('industries.create');
        Route::post('/industries', [IndustryController::class, 'store'])->name('industries.store');
        Route::get('/industries/{industry}/edit', [IndustryController::class, 'edit'])->name('industries.edit');
        Route::put('/industries/{industry}', [IndustryController::class, 'update'])->name('industries.update');
        Route::delete('/industries/{industry}', [IndustryController::class, 'destroy'])->name('industries.destroy');

        // Gallery CRUD
        Route::get('/gallery', [AdminGalleryController::class, 'index'])->name('gallery.index');
        Route::get('/gallery/create', [AdminGalleryController::class, 'create'])->name('gallery.create');
        Route::post('/gallery', [AdminGalleryController::class, 'store'])->name('gallery.store');
        Route::get('/gallery/{gallery}/edit', [AdminGalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('/gallery/{gallery}', [AdminGalleryController::class, 'update'])->name('gallery.update');
        Route::delete('/gallery/{gallery}', [AdminGalleryController::class, 'destroy'])->name('gallery.destroy');

        // Events CRUD
        Route::get('/events', [EventController::class, 'index'])->name('events.index');
        Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/events', [EventController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

        // Inquiry response
        Route::post('/inquiries/{contact}/respond', [DashboardController::class, 'respond'])->name('inquiries.respond');

        // Reviews (public submission approval)
        Route::get('/reviews', [TestimonialController::class, 'reviews'])->name('reviews.index');
        Route::patch('/reviews/{testimonial}/approve', [TestimonialController::class, 'approve'])->name('reviews.approve');
        Route::delete('/reviews/{testimonial}', [TestimonialController::class, 'destroyReview'])->name('reviews.destroy');
    });
});
