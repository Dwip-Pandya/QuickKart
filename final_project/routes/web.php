<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryProductsController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\ReviewController;


Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome'); // Replace with actual home view
})->name('home')->middleware('auth'); // Use middleware if needed

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'registerUser'])->name('register.post');



Route::get('/products/{category_id}/{subcat_id?}', [ProductController::class, 'index'])->name('products.index');



Route::get('/products2/{category_id}/{subcat_id}', [SubcategoryProductsController::class, 'index'])->name('subcategory.products');


Route::get('/single/{id}', [ProductDetailsController::class, 'show'])->name('product.details');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{cart_id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{cart_id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/checkout/thankyou', [CheckoutController::class, 'thankYou'])->name('checkout.thankyou');
Route::get('/checkout/payment/{orderId}', [CheckoutController::class, 'paymentPage'])->name('checkout.payment');


Route::get('/vieworder/{order_id}', [OrderController::class, 'viewOrder'])->name('vieworder');


Route::get('/myorders', [OrderController::class, 'myOrders'])->name('myorders');



Route::get('/payment/{order_id}', [RazorpayPaymentController::class, 'showRazorpayForm'])->name('razorpay.payment');
Route::post('/create_order', [RazorpayPaymentController::class, 'createOrder']);
Route::post('/razorpay/verify', [RazorpayPaymentController::class, 'verify']);


Route::get('/FAQ', function () {
    return view('faq');
});
Route::get('/shipping', function () {
    return view('shipping');
});
Route::get('/return', function () {
    return view('return');
});


Route::post('/request-product', [ProductRequestController::class, 'store'])->name('product.request');

Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');


Route::get('/myreviews', [ReviewController::class, 'myReviews'])->name('myreviews');
Route::delete('/myreviews/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');


Route::get('/reviews/{product_id}', [ReviewController::class, 'productReviews'])->name('product.reviews');


// admin 
use App\Http\Controllers\AdminDashboardController;

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

use App\Http\Controllers\AdminProductController;

Route::resource('adminproduct', AdminProductController::class);

use App\Http\Controllers\AdminCategoryController;

Route::resource('admincategory', AdminCategoryController::class);

use App\Http\Controllers\AdminSubcategoryController;

Route::resource('adminsubcategory', AdminSubcategoryController::class);

use App\Http\Controllers\AdminUserController;

Route::resource('adminuser', AdminUserController::class);

use App\Http\Controllers\AdminOrderController;

Route::resource('adminorder', AdminOrderController::class);

use App\Http\Controllers\AdminRequestController;

Route::resource('adminrequest', AdminRequestController::class);

use App\Http\Controllers\AdminReviewController;

Route::resource('adminreview', AdminReviewController::class);

use App\Http\Controllers\ManualPasswordController;

Route::post('/change-password', [ManualPasswordController::class, 'updatePassword']);







// for the home page's top product and highlighted products 
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
