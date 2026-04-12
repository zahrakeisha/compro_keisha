<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MarketingsController;
use App\Http\Controllers\ContactinfoController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\VisionsController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ReportController;

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


Route::middleware(['track'])->group(function () {
    //home
    Route::get('/', [FrontController::class, 'index']);
    Route::get('/aboutme', [FrontController::class, 'about']);
    Route::get('/visi_misi', [FrontController::class, 'visi']);
    Route::get('/blogger', [FrontController::class, 'blog']);
    Route::get('/blogger/{id}', [FrontController::class, 'blogsDetail'])->name('blogs.detail');
    Route::get('/contactsfront', [FrontController::class, 'contacts']);
    Route::get('/servicedetail/{id}', [FrontController::class, 'servicedetail'])->name('service.detail');
    Route::get('/servicedetail/{slug}', [ServiceController::class, 'show'])->name('service.detail.show');
});





//login route
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/loginproses', [AuthController::class, 'proseslogin'])->name('login.proseslogin');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

//route about us
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/about/create', [AboutController::class, 'create'])->name('about.create');
Route::post('/about', [AboutController::class, 'store'])->name('about.store');
Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');
Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');
Route::get('/about/{id}/active', [AboutController::class, 'active'])->name('about.active');
Route::get('/about/{id}/nonactive', [AboutController::class, 'nonactive'])->name('about.nonactive');


//route service ADMIN
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
Route::put('/service/{id}', [ServiceController::class, 'update'])->name('service.update');
Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
//PENGUNJUNG SLUG
Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.show');

//route clients
Route::get('/client',[ClientController::class, 'index'])->name('client.index');
Route::get('/client/create',[ClientController::class, 'create'])->name('client.create');
Route::post('/client',[ClientController::class, 'store'])->name('client.store');
Route::get('/client/{id}/edit',[ClientController::class,'edit'])->name('client.edit');
Route::put('/client/{id}',[ClientController::class, 'update'])->name('client.update');
Route::delete('/client/{id}',[ClientController::class, 'destroy'])->name('client.destroy');

//route user ADMIN
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


//route blog ADMIN
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

//route contact ADMIN
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

//route marketings
Route::get('/marketing', [MarketingsController::class, 'index'])->name('marketing.index');
Route::get('/marketing/create', [MarketingsController::class, 'create'])->name('marketing.create');
Route::post('/marketing', [MarketingsController::class, 'store'])->name('marketing.store');
Route::get('/marketing/{id}/edit', [MarketingsController::class, 'edit'])->name('marketing.edit');
Route::put('/marketing/{id}', [MarketingsController::class, 'update'])->name('marketing.update');
Route::delete('/marketing/{id}', [MarketingsController::class, 'destroy'])->name('marketing.destroy');
Route::get('/marketing/{id}/active', [MarketingsController::class, 'active'])->name('marketing.active');
Route::get('/marketing/{id}/nonactive', [MarketingsController::class, 'nonactive'])->name('marketing.nonactive');


//route contact info
Route::get('/contactinfo', [ContactinfoController::class, 'index'])->name('contactinfo.index');
Route::get('/contactinfo/create', [ContactinfoController::class, 'create'])->name('contactinfo.create');
Route::post('/contactinfo', [ContactinfoController::class, 'store'])->name('contactinfo.store');
Route::get('/contactinfo/{id}/edit', [ContactinfoController::class, 'edit'])->name('contactinfo.edit');
Route::put('/contactinfo/{id}', [ContactinfoController::class, 'update'])->name('contactinfo.update');
Route::delete('/contactinfo/{id}', [ContactinfoController::class, 'destroy'])->name('contactinfo.destroy');
Route::get('/contactinfo/{id}/active', [ContactinfoController::class, 'active'])->name('contactinfo.active');
Route::get('/contactinfo/{id}/nonactive', [ContactinfoController::class, 'nonactive'])->name('contactinfo.nonactive');

//route organization
Route::get('/organization', [OrganizationController::class, 'index'])->name('organization.index');
Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organization.create');
Route::post('/organization', [OrganizationController::class, 'store'])->name('organization.store');
Route::get('/organization/{id}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');
Route::put('/organization/{id}', [OrganizationController::class, 'update'])->name('organization.update');
Route::delete('/organization/{id}', [OrganizationController::class, 'destroy'])->name('organization.destroy');

//route visi dan misi
Route::get('/visions', [VisionsController::class, 'index'])->name('visions.index');
Route::get('/visions/create', [VisionsController::class, 'create'])->name('visions.create');
Route::post('/visions', [VisionsController::class, 'store'])->name('visions.store');
Route::get('/visions/{id}/edit', [VisionsController::class, 'edit'])->name('visions.edit');
Route::put('/visions/{id}', [VisionsController::class, 'update'])->name('visions.update');
Route::delete('/visions/{id}', [VisionsController::class, 'destroy'])->name('visions.destroy');
Route::get('/visions/{id}/active', [VisionsController::class, 'active'])->name('visions.active');
Route::get('/visions/{id}/nonactive', [VisionsController::class, 'nonactive'])->name('visions.nonactive');

//route slider
Route::get('/sliders', [SlidersController::class, 'index'])->name('sliders.index');
Route::get('/sliders/create', [SlidersController::class, 'create'])->name('sliders.create');
Route::post('/sliders', [SlidersController::class, 'store'])->name('sliders.store');
Route::get('/sliders/{id}/edit', [SlidersController::class, 'edit'])->name('sliders.edit');
Route::put('/sliders/{id}', [SlidersController::class, 'update'])->name('sliders.update');
Route::delete('/sliders/{id}', [SlidersController::class, 'destroy'])->name('sliders.destroy');
Route::get('/sliders/{id}/active', [SlidersController::class, 'active'])->name('sliders.active');
Route::get('/sliders/{id}/nonactive', [SlidersController::class, 'nonactive'])->name('sliders.nonactive');

//route nav
Route::get('/nav',[NavController::class, 'index'])->name('nav.index');
Route::get('/nav/create',[NavController::class, 'create'])->name('nav.create');
Route::post('/nav',[NavController::class, 'store'])->name('nav.store');
Route::get('/nav/{id}/edit',[NavController::class,'edit'])->name('nav.edit');
Route::put('/nav/{id}',[NavController::class, 'update'])->name('nav.update');
Route::delete('/nav/{id}',[NavController::class, 'destroy'])->name('nav.destroy');
Route::get('/nav/{id}/active', [NavController::class, 'active'])->name('nav.active');
Route::get('/nav/{id}/nonactive', [NavController::class, 'nonactive'])->name('nav.nonactive');

//route footer
Route::get('/footer',[FooterController::class, 'index'])->name('footer.index');
Route::get('/footer/create',[FooterController::class, 'create'])->name('footer.create');
Route::post('/footer', [FooterController::class, 'store'])->name('footer.store');
Route::get('/footer/{id}/edit', [FooterController::class, 'edit'])->name('footer.edit');
Route::put('/footer/{id}',[FooterController::class, 'update'])->name('footer.update');
Route::delete('/footer/{id}', [FooterController::class, 'destroy'])->name('footer.destroy');
Route::get('/footer/{id}/active', [FooterController::class, 'active'])->name('footer.active');
Route::get('/footer/{id}/nonactive', [FooterController::class, 'nonactive'])->name('footer.nonactive');

//route visitor
Route::get('/visitor', [VisitorController::class, 'index'])->name('visitor.index');

Route::post('/report/visitor/generate', [ReportController::class, 'generatePDF'])->name('report.visitor.generate');