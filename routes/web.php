<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\frontend\HomeController;

use App\Http\Controllers\backend\FilterController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ProductController;

use App\Http\Controllers\backend\CategoryController;

use App\Http\Controllers\frontend\ProductsController;

use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\frontend\CategorysController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\backend\SubscriptionController;
use App\Http\Controllers\frontend\SubcategorysController;
use App\Http\Controllers\backend\SubSubcategoryController;
use App\Http\Controllers\frontend\PasswordResetController;
use App\Http\Controllers\frontend\SubscriptionsController;
use App\Http\Controllers\frontend\SubSubcategorysController;

// FRONTEND
Route::get('/', [HomeController::class, 'Home'])->name('frontend.home');
Route::get('/getsubcategorys/{id}', [HomeController::class, 'Getsubcategorys'])->name('frontend.getsubcategory');

// Reset Password
Route::get('/forgot-password', [PasswordResetController::class, 'ForgotPassword'])->name('password.forgot');
Route::get('/reset-password', [PasswordResetController::class, 'ResetPassword'])->name('password.reset');
Route::post('/store-password', [PasswordResetController::class, 'StorePassword'])->name('password.store');
Route::post('/mail-password', [PasswordResetController::class, 'MailPassword'])->name('password.mail');



// CHAT - PRODUCT-WISE
Route::get('/chat', [ProductsController::class, 'Chat'])->name('frontend.product.chat');  // chat view
Route::post('/storechat', [ProductsController::class, 'StoreChat'])->name('frontend.product.storechat');  // postchat

Route::get('/myadds', [HomeController::class, 'Myadds'])->name('frontend.myadds');
Route::get('/contact', [HomeController::class, 'contact'])->name('frontend.contact');
Route::get('/about', [HomeController::class, 'About'])->name('frontend.about');

//PROFILE
Route::get('/user_profile', [HomeController::class, 'UserProfile'])->name('frontend.profile.profile');
Route::post('/user_profile_update', [HomeController::class, 'UserProfileUpdate'])->name('frontend.profile.profileupdate');
// Route::get('/checkcategory/{id}', [HomeController::class, 'Checksubcategorys'])->name('frontend.checkcategory');


// SHIYA - Autoload counties & places
Route::get('/getcounties/{region}',[ProductsController::class,'getCounties']);
Route::get('/getplaces/{county}',[ProductsController::class,'getPlaces']);
// ENDS


//CATEGORY
Route::get('/all_categorys', [CategorysController::class, 'Allcategory'])->name('frontend.allcategorys');
// Route::get('/getsubcategorys/{id}', [CategorysController::class, 'Getsubcategorys'])->name('frontend.getsubcategory');

// SUBCATEGORY
Route::get('/subcategorys', [SubcategorysController::class, 'Allsubcategory'])->name('frontend.allsubcategorys');

// SUBSUBCATEGORY
Route::get('/sub_subcategorys', [SubSubcategorysController::class, 'AllSubsubcategory'])->name('frontend.allsubsubcategorys');

// BUYER PRODUCTS
Route::get('/getsub_subcategory/{id}',[ProductsController::class,'GetSubSubcategory'])->name('getsub-subcategory');
Route::get('/products', [ProductsController::class, 'AllProducts'])->name('frontend.allproducts');

Route::get('/categoryallproducts', [ProductsController::class, 'CategoryAllProducts'])->name('frontend.categoryallproducts'); //categorywiseallproducts
Route::post('/storecategoryallproducts', [ProductsController::class, 'StoreCategoryAllProducts'])->name('frontend.storecategoryallproducts'); //filtercategorywiseallproducts

Route::get('/subcategoryallproducts', [ProductsController::class, 'SubcategoryAllProducts'])->name('frontend.subcategoryallproducts'); //subcategorywiseallproducts

Route::post('/storesubcategoryallproducts', [ProductsController::class, 'StoreSubcategoryAllProducts'])->name('frontend.storesubcategoryallproducts'); //filterationsubcategorywiseallproducts

Route::get('/subofsubcategoryallproducts', [ProductsController::class, 'SubofsubcategoryAllproducts'])->name('frontend.subofsubcategoryallproducts'); //subofsubcategorywiseallproducts
Route::post('/storesubofsubcategoryallproducts', [ProductsController::class, 'StoreSubofsubcategoryAllproducts'])->name('frontend.StoreSubofsubcategoryAllproducts'); //filterationsubofsubcategorywiseallproducts

// SELLER ADDING PRODUCTS
Route::get('/select-product-division', [ProductsController::class, 'ProductDivision'])->name('frontend.product.productdivision');   //remark
Route::post('/add-new-product', [ProductsController::class, 'AddNewProduct'])->name('frontend.product.addnewproduct');   //remark
Route::get('/add_new_product', [ProductsController::class, 'AddProduct'])->name('frontend.product.addproduct');   //remark


Route::get('/edit-product', [ProductsController::class, 'ProductEdit'])->name('frontend.product.ProductEdit');    //jacqu
Route::post('/update-product', [ProductsController::class, 'ProductUpdate'])->name('frontend.product.ProductUpdate');

Route::get('/add-product', [ProductsController::class, 'GetNewProduct'])->name('frontend.addproduct');   //remark
// Route::post('/product-status-update', [ProductsController::class, 'ProductStatusUpdate'])->name('frontend.ProductStatusUpdate');
Route::get('/show',[ProductsController::class,'Show'])->name('show');
Route::get('/loadsubcategory/{id}',[ProductsController::class,'LoadSubCategory'])->name('loadsubcategory');

Route::post('/store-productt', [ProductsController::class, 'StoreProductt'])->name('frontend.product.storeproductt');   //remark

Route::get('/single-product', [ProductsController::class, 'SingleProduct'])->name('frontend.product.singleproduct');
Route::get('/get-single-product', [ProductsController::class, 'GetSingleProduct'])->name('frontend.get-singleproduct');


// Route::get('/add-categories', [ProductsController::class, 'AddCategories'])->name('frontend.product.addcategories');   //remark
// Route::get('/getfilters/{id}', [ProductsController::class, 'GetFilters'])->name('frontend.product.getfilters');   //remark
Route::post('/store_product', [ProductsController::class, 'StoreProduct'])->name('product.store');

//SUBSCRIPTIONPLAN FRONTEND
Route::get('/subscription_plans', [SubscriptionsController::class, 'Subscription'])->name('frontend.subscriptonplan');
Route::get('/individual-plan', [SubscriptionsController::class, 'Subscriptiontypesindividual'])->name('frontend.subscriptonplantypes');
Route::get('/business-plan', [SubscriptionsController::class, 'Subscriptiontypesbussiness'])->name('frontend.subscriptonplantypesbussiness');

// subscriptions
Route::get('/user-subscriptions', [SubscriptionsController::class, 'UserSubscriptions'])->name('frontend.user_subscriptions');
Route::get('/renew/{id}', [SubscriptionsController::class, 'Renew'])->name('user_subscriptions.renew');
Route::get('/subscribed_products', [SubscriptionsController::class, 'SubscribedProducts'])->name('frontend.subscribed_products');
Route::post('/cart', [SubscriptionsController::class, 'Cart'])->name('subscription.cart');


//SUBSCRIPTION PLAN DETAILS
Route::get('/subscription_plans_details', [SubscriptionsController::class, 'SubscriptionPlandetails'])->name('frontend.subscriptonplandetails');
Route::get('/store_user_subscriptions', [SubscriptionsController::class, 'StoreUserSubscriptions'])->name('frontend.storeusersubscription');

Route::post('/session', [SubscriptionsController::class, 'session'])->name('session');
Route::get('/success', [SubscriptionsController::class, 'success'])->name('success');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//BACKEND
Route::get('/admin-login', [AdminController::class, 'LoginView'])->name('login.view');
Route::post('/loginn', [AdminController::class, 'Login'])->name('loginn');
Route::middleware(['admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'View'])->name('admin.admin-dashboard');
    Route::get('/logoutt', [AdminController::class, 'Logout'])->name('logoutt');
});

//  SLIDERS
Route::get('/sliders', [SliderController::class, 'AllSlider'])->name('slider.all');
Route::get('/add_slider', [SliderController::class, 'AddSlider'])->name('slider.add');
Route::post('/store_slider', [SliderController::class, 'StoreSlider'])->name('slider.store');
Route::get('/edit_slider', [SliderController::class, 'EditSlider'])->name('slider.edit');
Route::post('/update_slider/{id}', [SliderController::class, 'UpdateSlider'])->name('slider.update');
Route::get('/delete_slider/{id}', [SliderController::class, 'DeleteSlider'])->name('slider.delete');

//  CATEGORY
Route::get('/categories', [CategoryController::class, 'AllCategory'])->name('category.all');
Route::get('/add_category', [CategoryController::class, 'AddCategory'])->name('category.add');
Route::post('/store_category', [CategoryController::class, 'StoreCategory'])->name('category.store');
Route::get('/edit_category', [CategoryController::class, 'EditCategory'])->name('category.edit');
Route::post('/update_category/{id}', [CategoryController::class, 'UpdateCategory'])->name('category.update');
Route::get('/delete_category/{id}', [CategoryController::class, 'DeleteCategory'])->name('category.delete');

//  SUBCATEGORY
Route::get('/subcategory', [SubcategoryController::class, 'AllSubCategory'])->name('subcategory.all');
Route::get('/add_subcategory', [SubcategoryController::class, 'AddSubCategory'])->name('subcategory.add');
Route::post('/store_subcategory', [SubcategoryController::class, 'StoreSubCategory'])->name('subcategory.store');
Route::get('/edit_subcategory', [SubcategoryController::class, 'EditSubCategory'])->name('subcategory.edit');
Route::post('/update_subcategory/{id}', [SubcategoryController::class, 'UpdateSubCategory'])->name('subcategory.update');
Route::get('/delete_subcategory/{id}', [SubcategoryController::class, 'DeleteSubCategory'])->name('subcategory.delete');

//  SUBSCRIPTION PLAN
Route::get('/subscription', [SubscriptionController::class, 'AllSubscription'])->name('subscription.all');
Route::get('/add_subscription', [SubscriptionController::class, 'AddSubscription'])->name('subscription.add');
Route::post('/store_subscription', [SubscriptionController::class, 'StoreSubscription'])->name('subscription.store');
Route::get('/edit_subscription', [SubscriptionController::class, 'EditSubscription'])->name('subscription.edit');
Route::post('/update_subscription/{id}', [SubscriptionController::class, 'UpdateSubscription'])->name('subscription.update');
Route::get('/delete_subscription/{id}', [SubscriptionController::class, 'DeleteSubscription'])->name('subscription.delete');

Route::get('/user_plans', [SubscriptionController::class, 'UserSubscription'])->name('subscription.usersubscription');

//  SUB-SUBCATEGORY
Route::get('/sub_subcategery', [SubSubcategoryController::class, 'AllSubSubCategory'])->name('subsubcategory.all');
Route::get('/add_sub_subcategery', [SubSubcategoryController::class, 'AddSubSubCategory'])->name('subsubcategory.add');
Route::get('/getsubcategory/{id}',[SubSubcategoryController::class,'GetSubCategory'])->name('getsubcategory');
Route::post('/store_sub_subcategery', [SubSubcategoryController::class, 'StoreSubSubCategory'])->name('subsubcategory.store');
Route::get('/edit_sub_subcategery', [SubSubcategoryController::class, 'EditSubSubCategory'])->name('subsubcategory.edit');
Route::post('/update_sub_subcategery/{id}', [SubSubcategoryController::class, 'UpdateSubSubCategory'])->name('subsubcategory.update');
Route::get('/delete_sub_subcategery/{id}', [SubSubcategoryController::class, 'DeleteSubSubCategory'])->name('subsubcategory.delete');


//  PRODUCTS
Route::get('/product', [ProductController::class, 'AllProduct'])->name('product.all');
Route::get('/add_product', [ProductController::class, 'AddProduct'])->name('product.add');

//PRODUCTFilters
Route::get('/productfilters', [ProductController::class, 'ProductFilters'])->name('product.filters');
Route::post('/store_productfilters/{id}', [ProductController::class, 'StoreFilterProduct'])->name('product.filters.store');

// Route::get('/getsubcategory/{id}',[ProductController::class,'GetSubCategory'])->name('getsubcategory');

Route::get('/getsub_subcategory/{id}',[ProductController::class,'GetSubSubcategory'])->name('getsub-subcategory');
Route::post('/store_product', [ProductController::class, 'StoreProduct'])->name('product.store');
Route::get('/edit_product', [ProductController::class, 'EditProduct'])->name('product.edit');
Route::post('/update_product/{id}', [ProductController::class, 'UpdateProduct'])->name('product.update');
Route::get('/delete_product/{id}', [ProductController::class, 'DeleteProduct'])->name('product.delete');

//  FILTER
Route::get('/filter', [FilterController::class, 'AllFilter'])->name('filter.all');
Route::get('/add_filter', [FilterController::class, 'AddFilter'])->name('filter.add');
Route::post('/store_filter', [FilterController::class, 'StoreFilter'])->name('filter.store');
Route::get('/edit_filter', [FilterController::class, 'EditFilter'])->name('filter.edit');
Route::post('/update_filter/{id}', [FilterController::class, 'UpdateFilter'])->name('filter.update');
Route::get('/delete_filter/{id}', [FilterController::class, 'DeleteFilter'])->name('filter.delete');
Route::get('/delete_filter_option/{id}', [FilterController::class, 'DeleteFilterOtion'])->name('filter.filteroptiondelete');




