<?php


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;


use App\Http\Controllers\client\CardController;
use App\Http\Controllers\client\HomeController;



use App\Http\Controllers\client\NewsController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\client\LoginController;
use App\Http\Controllers\client\UsersController;

use App\Http\Controllers\client\ClientCategories;
use App\Http\Controllers\Admin\BankCardController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\client\AddressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//View Admin


use App\Http\Controllers\admin\AdminCardController;
use App\Http\Controllers\admin\AdminNewsController;


use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\client\CheckoutController;

use App\Http\Controllers\client\ProductsController;





//admin banner
// use App\Http\Controllers\Admin\AdminBannersController;
use App\Http\Controllers\client\RegisterController;

use App\Http\Controllers\Admin1\AdminHomeController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminSizesController;



use App\Http\Controllers\admin\AdminBrandsController;
use App\Http\Controllers\admin\AdminColorsController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\client\ClientOrderControler;
use App\Http\Controllers\Admin\AdminBannersController;
use App\Http\Controllers\Admin\AdminCouponsController;
use App\Http\Controllers\client\ClientBanksController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminTransferController;
use App\Http\Controllers\Admin1\AdminCustomerController;
use App\Http\Controllers\Admin\AdminCommentsController; 



use App\Http\Controllers\admin\AdminInventoryController;

use App\Http\Controllers\Admin\AdminUserStaffController;

use App\Http\Controllers\Admin\AdminCategoriesController;

use App\Http\Controllers\Admin\AdminStatisticsController;
use App\Http\Controllers\Client\ChangePasswordController;
use App\Http\Controllers\Client\ForgotPasswordController;
use App\Http\Controllers\client\CheckoutThankyouController;
use App\Http\Controllers\AdminUserController as ControllersAdminUserController;

//quản lí admin và nhân viên
// Route::prefix('admin')->group(function () {
//     Route::resource('user-staff', AdminUserStaffController::class)->middleware('admin'); // Thêm middleware vào đây



Route::prefix('admin')->group(function () {
    Route::resource('user-staff', AdminUserStaffController::class)->middleware('admin'); // Thêm middleware vào đây


    // Đăng nhập admin và nhân viên
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


 // Mã giảm giá
 Route::resource('admin-coupons', AdminCouponsController::class);
//  Route::get('/admin-coupons/products/{categoryId}', [AdminCouponsController::class, 'getProductsByCategory']);





 // Sản phẩm
 Route::resource('admin-products', AdminProductsController::class);

 // Danh mục
 Route::resource('admin-categories', AdminCategoriesController::class);

 // Khách hàng
 Route::resource('admin-customers', AdminUserController::class);

 // Banner
 Route::resource('admin-banners', AdminBannersController::class);

 Route::get('Admin/Banners/trash', [AdminBannersController::class, 'trash']);

Route::post('Admin/Banners/delete/{id}', [AdminBannersController::class, 'delete']);

 // Đặt hàng
 Route::resource('admin-orders', AdminOrdersController::class);
 // Route để hiển thị trang duyệt đơn hàng
Route::get('admin/orders/{id}/approve', [AdminOrdersController::class, 'approve'])->name('admin-orders.approve');
Route::get('/admin/orders/approve', [AdminOrdersController::class, 'approveIndex'])->name('admin-orders.approve.index');
Route::get('/admin/orders/deleted', [AdminOrdersController::class, 'deletedOrders'])->name('admin-orders.deleted');
Route::put('/admin/orders/restore/{id}', [AdminOrdersController::class, 'restore'])->name('admin-orders.restore');
Route::delete('/admin/orders/force-delete/{id}', [AdminOrdersController::class, 'forceDelete'])->name('admin-orders.forceDelete');

Route::get('/admin/orders/received', [AdminOrdersController::class, 'receivedIndex'])->name('admin-orders.received');


// Route để cập nhật trạng thái đơn hàng
Route::put('admin/orders/{id}/update-status', [AdminOrdersController::class, 'updateStatus'])->name('admin-orders.update-status');


 // Thống kê
 Route::get('/admin/statistics', [AdminStatisticsController::class, 'index'])->name('admin.statistics');
 Route::get('/admin/statistics/fetch', [AdminStatisticsController::class, 'getStatistics'])->name('admin.statistics.fetch');


 // Route cho tin tức
 Route::resource('new', AdminNewsController::class);

 Route::resource('users', AdminUserController::class);
 //
 Route::resource('inventory', AdminInventoryController::class);



 Route::resource('discount', DiscountController::class);
Route::post('/apply-discount', [DiscountController::class, 'applyDiscount'])->name('apply.discount');
Route::post('/remove-discount', [DiscountController::class, 'removeDiscount'])->name('remove.discount');
// Route::resource('admin-comments', AdminCommentsController::class);
Route::resource('admin-brands', AdminBrandController::class);
Route::resource('admin-ordersdangvanchuyen', AdminOrdersController::class);
//
Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // Mã giảm giá
    Route::resource('admin-coupons', AdminCouponsController::class);
    //  Route::get('/admin-coupons/products/{categoryId}', [AdminCouponsController::class, 'getProductsByCategory']);






    // Sản phẩm
    Route::resource('admin-products', AdminProductsController::class);

    // Danh mục
    Route::resource('admin-categories', AdminCategoriesController::class);

    // Khách hàng
    Route::resource('admin-customers', AdminUserController::class);

    // Banner
    Route::resource('admin-banners', AdminBannersController::class);

    // Đặt hàng
    Route::resource('admin-orders', AdminOrdersController::class);
    // Route để hiển thị trang duyệt đơn hàng
    Route::get('admin/orders/{id}/approve', [AdminOrdersController::class, 'approve'])->name('admin-orders.approve');
    Route::get('/admin/orders/approve', [AdminOrdersController::class, 'approveIndex'])->name('admin-orders.approve.index');
    Route::get('/admin/orders/deleted', [AdminOrdersController::class, 'deletedOrders'])->name('admin-orders.deleted');
    Route::put('/admin/orders/restore/{id}', [AdminOrdersController::class, 'restore'])->name('admin-orders.restore');
    Route::delete('/admin/orders/force-delete/{id}', [AdminOrdersController::class, 'forceDelete'])->name('admin-orders.forceDelete');

    Route::get('/admin/orders/received', [AdminOrdersController::class, 'receivedIndex'])->name('admin-orders.received');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

    // Route để cập nhật trạng thái đơn hàng
    Route::put('admin/orders/{id}/update-status', [AdminOrdersController::class, 'updateStatus'])->name('admin-orders.update-status');


    // Thống kê
    Route::get('/admin/statistics', [AdminStatisticsController::class, 'index'])->name('admin.statistics');
    Route::get('/admin/statistics/fetch', [AdminStatisticsController::class, 'getStatistics'])->name('admin.statistics.fetch');


    // Route cho tin tức
    Route::resource('new', AdminNewsController::class);

    Route::resource('users', AdminUserController::class);
    //
    Route::resource('inventory', AdminInventoryController::class);



    Route::resource('discount', DiscountController::class);
    Route::post('/apply-discount', [DiscountController::class, 'applyDiscount'])->name('apply.discount');
    Route::post('/remove-discount', [DiscountController::class, 'removeDiscount'])->name('remove.discount');
    Route::resource('admin-comments', AdminCommentsController::class);
    Route::resource('admin-brands', AdminBrandController::class);
    Route::resource('admin-ordersdangvanchuyen', AdminOrdersController::class);
    //
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
    Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('admin.reviews.show');
    Route::get('/admin-don-hang-da-huy', [AdminOrdersController::class, 'listDonHangDaHuy'])->name('admin.donHangDaHuy');

    Route::resource('admin-brands', AdminBrandsController::class);
    //color
    Route::resource('admin-color', AdminColorsController::class);
    //size
    Route::resource('admin-size', AdminSizesController::class);

    Route::resource('admin-card', AdminCardController::class);
    Route::get('/admin/carts', [AdminCardController::class, 'index'])->name('admin.carts.index');

    Route::get('user/{userId}/addresses', [AddressController::class, 'listAddresses'])->name('address.list');
Route::post('user/{userId}/address', [AddressController::class, 'storeAddress'])->name('address.store');
Route::get('user/{userId}/address/form', [AddressController::class, 'showAddressForm'])->name('address.form');
Route::get('user/{userId}/address/create', [AddressController::class,'CreateAddress'])->name('address.create');
Route::delete('/address/{id}', [AddressController::class, 'delete'])->name('address.delete');
Route::get('/address/{id}/edit', [AddressController::class, 'edit'])->name('address.edit');
Route::put('/address/{id}', [AddressController::class, 'update'])->name('address.update');
Route::get('/user/{userId}/address/select', [AddressController::class, 'showAddressForm'])->name('address.select');
Route::delete('/orders/{id}/cancel', [ClientOrderControler::class, 'cancelOrder'])->name('orders.cancel');
Route::get('/admin/orders/canceled', [AdminOrdersController::class, 'canceledOrders'])->name('admin.orders.canceled');
// Route để hủy đơn hàng
Route::put('/admin/orders/{orderId}/cancel', [AdminOrdersController::class, 'cancelOrder'])->name('orders.cancel');
Route::get('/admin/orders/canceled', [AdminOrdersController::class, 'listDonHangDaHuy'])->name('admin.orders.canceled');
Route::delete('/admin/orders/{orderId}/cancel', [AdminOrdersController::class, 'cancelOrder'])->name('admin.orders.cancel');
//route cho đơn hàng đã hủy
Route::get('admin/orders/canceled', [AdminOrdersController::class, 'listDonHangDaHuy'])->name('admin-orders.cancelled');


// thêm tài khoản ngân hàng admin
Route::resource('bank-cards', BankCardController::class);
//yêu cầu nạp tiền
Route::get('/transfer-requests', [AdminTransferController::class, 'index'])->name('admin.transfer-requests.index');
Route::post('/transfer-requests/{id}/approve', [AdminTransferController::class, 'approve'])->name('admin.transfer-requests.approve');
Route::post('/transfer-requests/{id}/reject', [AdminTransferController::class, 'reject'])->name('admin.transfer-requests.reject');
Route::get('/approved-customers', [AdminTransferController::class, 'approvedCustomers'])->name('admin.approved-customers');


});


// dang nhap admin và nhân viên

// Route cho view client
Route::resource('client-home', HomeController::class);
Route::resource('client-user', UsersController::class);
Route::resource('client-categories', ClientCategories::class);
Route::resource('client-login', LoginController::class);
Route::resource('client-register', RegisterController::class);
//quên mật khẩu
Route::get('client-password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('client-password.reset');
Route::post('client-password/email', [ForgotPasswordController::class, 'sendResetLink'])->name('client-password.email');
Route::resource('client-products', ProductsController::class);
// đổi mật khẩu khách hàng
Route::get('client-password/change', [ChangePasswordController::class, 'index'])->name('client-password.change');
Route::post('client-password/update', [ChangePasswordController::class, 'update'])->name('client-password.update');

Route::post('/checkout', [CheckoutController::class, 'store'])->name('client-checkout.store');
Route::resource('client-news', NewsController::class);

Route::resource('client-card', CardController::class);
//
Route::post('/cart/add', [CardController::class, 'add'])->name('cart.add');
Route::get('/cart', [CardController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CardController::class, 'remove'])->name('cart.remove');



// Route::delete('/cart/remove/{id}', [CardController::class, 'remove'])->name('card.remove');
//checkout

Route::resource('client-checkout', CheckoutController::class);
Route::post('/checkout', [CheckoutController::class, 'process'])->name('client-checkout.process');
Route::post('/checkout/momo', [CheckoutController::class, 'payWithMomo'])->name('payment.momo');
Route::get('/checkout/momo/return', [CheckoutController::class, 'momoReturn'])->name('payment.momo.return');



// Route::resource('client-checkout', CheckoutController::class);

Route::resource('client-thankyou', CheckoutThankyouController::class);
//nạp tiền khách hàng
Route::resource('client-banks', ClientBanksController::class);

Route::resource('client-news',  NewsController::class);
Route::resource('client-card',  CardController::class);
// đăng xuất khách hàng
Route::post('client-logout', [LoginController::class, 'logout'])->name('client-logout');
// nạp tiền khách hàng
Route::post('/client-bank/transfer-request', [ClientBanksController::class, 'storeTransferRequest'])->name('client-bank.transfer-request');


Route::resource('admin-customers', AdminUserController::class);

Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}/restore', [AdminUserController::class, 'restore'])->name('users.restore');


// Danh mục
Route::resource('admin-categories', AdminCategoriesController::class);
// Mã giảm giá
Route::resource('admin-coupons', AdminCouponsController::class);
// Đặt hàng
Route::resource('admin-orders', AdminOrdersController::class);

// in pdf
Route::get('/admin/orders/{id}/pdf', [AdminOrdersController::class, 'generatePDF'])->name('admin-orders.generatePDF');







// Route::resource('admin-products', AdminProductsController::class);


// Route::resource('admin-banners', AdminBannersController::class);



Route::get('/new', [AdminNewsController::class, 'index'])->name('new.index');
Route::get('/new/create', [AdminNewsController::class, 'create'])->name('new.create');
Route::get('/new/{id}/edit', [AdminNewsController::class, 'edit'])->name('new.edit');
Route::post('/new/store', [AdminNewsController::class, 'store'])->name('new.store');
Route::put('/new/{id}/update', [AdminNewsController::class, 'update'])->name('new.update');
Route::delete('/new/{id}', [AdminNewsController::class, 'destroy'])->name('new.destroy');
Route::get('/new/show/{id}', [AdminNewsController::class, 'show'])->name('new.show');

route::post('/filter-by-date', [HomeAdminController::class, 'filter_by_date']);
Route::post('/filter-by-select', [HomeAdminController::class, 'filter_by_select']);
Route::resource('admin-home', HomeAdminController::class);




Route::get('admin/user/address',[AdminOrdersController::class,'listAdrress'])->name('admin.address');
Route::get('admin/address/show/{userId}',[AdminOrdersController::class,'showAddress'])->name('admin.address.show');

Route::get('Client/order/{userId}',[ClientOrderControler::class,'listOrder'])->name('client.order');
Route::put('/orders/{id}/cancel', [ClientOrderControler::class, 'cancel'])->name('orders.cancel');
Route::get('/orders/{id}', [ClientOrderControler::class, 'show'])->name('orders.show');
//bình luận
Route::post('/client-products/{product}/comments', [ProductsController::class, 'storeComment'])->name('client-products.comments.store');



// route::get('admin-ui',function(){
//     return view('Admin1.Products.index');
// });
// route::get('admin-ui',function(){
//     return view('Admin1.Products.index');
// });
// route::get('admin-ui',function(){
//     return view('Admin1.Products.index');
// });
// route::get('admin-products',function(){
//     return view('Admin1.Products.create');
// });

// route::get('admin-products1',function(){
//     return view('Admin1.Products.show');
// });

// route::get('admin-products2',function(){
//     return view('Admin1.orders.index');
// });

// route::get('admin-products3',function(){
//     return view('Admin1.orders.show');
// });

// route::get('admin-customer',function(){
//     return view('Admin1.customer.show');
// });
// route::get('admin-customer1',function(){
//     return view('Admin1.users.index');
// });

// route::get('admin-login',function(){
//     return view('Admin1.auth.login');
// });
// Route::resource('users', AdminUserController::class);

// route::get('admin-ui',function(){
//     return view('Admin1.Home.index');
// });

// Route::resource('admin1-home',AdminHomeController ::class);
// Route::resource('admin1-kh',AdminCustomerController ::class);



// Route::get('/customeraddress', [Customeraddress::class, 'index'])->name('customeraddress.index');
// Route::get('/customeraddress/show/{id}',[Customeraddress::class,'show'])->name('customeraddress.show');
// Route::get('/customeraddress/create', [Customeraddress::class, 'create'])->name('customeraddress.create');
// Route::post('/customeraddress/store', [Customeraddress::class, 'store'])->name('customeraddress.store');

// route::get('admin-ui',function(){
//     return view('Admin1.Products.index');
// });
// route::get('admin-ui',function(){
//     return view('Admin1.Products.index');
// });
// route::get('admin-ui',function(){
//     return view('Admin1.Products.index');
// });
// route::get('admin-products',function(){
//     return view('Admin1.Products.create');
// });

// route::get('admin-products1',function(){
//     return view('Admin1.Products.show');
// });

// route::get('admin-products2',function(){
//     return view('Admin1.orders.index');
// });

// route::get('admin-products3',function(){
//     return view('Admin1.orders.show');
// });
// route::get('admin-products4',function(){
//     return view('Admin1.orders.listDonHangHuy');
// });

// route::get('admin-customer',function(){
//     return view('Admin1.customer.show');
// });
// route::get('admin-customer1',function(){
//     return view('Admin1.customer.index');
// });
// route::get('admin-new',function(){
//     return view('admin1/new.index');
// });





// use App\Http\Controllers\admin\AdminBrandsController;
// use App\Http\Controllers\Admin\AdminCategoriesController;
// use App\Http\Controllers\admin\AdminColorsController;
// use App\Http\Controllers\Admin\AdminProductsController;
// use App\Http\Controllers\admin\AdminSizesController;
// use Illuminate\Support\Facades\Route;

// Route::resource('admin-products', AdminProductsController::class);
// // danh mục admin
// Route::resource('admin-categories', AdminCategoriesController::class);
// // thuonghw hiệu
