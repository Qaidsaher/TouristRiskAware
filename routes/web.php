<?php

// use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCountryController;
use App\Http\Controllers\UserForAdminController;
use App\Models\News;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('pages/terms', function () {
        return view('pages.terms');
    })->name('pages.terms');

    Route::get('pages/contact', function () {
        return view('pages.contact');
    })->name('pages.contact');

    Route::get('pages/countries', [UserCountryController::class, 'index'])->name('pages.countries');
    Route::get('pages/countries/{id}', [UserCountryController::class, 'show'])->name('pages.countries_show');

    Route::get('pages/faq', function () {
        return view('pages.faq');
    })->name('pages.faq');


    Route::get('pages/news', function () {
        $news = News::all();
        return view('pages.news', compact('news'));
        // return response('sdf');
    })->name('pages.news');

    Route::get('pages/news/{id}', function ($id) {
        $news = News::findOrFail($id);
        $news_all = News::all();
        return view('pages.show_news', compact('news', 'news_all'));
    })->name('pages.newshow');

    Route::post('/country/add-comment', [UserCountryController::class, 'addComment'])->name('country.addComment');
    Route::delete('/country/delete-comment', [UserCountryController::class, 'deleteComment'])->name('country.deleteComment');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('news', NewsController::class);
    Route::resource('users', UserForAdminController::class);
    Route::resource('countries', CountryController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
