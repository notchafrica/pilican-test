<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Cashout\Index as CashoutIndex;
use App\Http\Livewire\Customer\Browse as CustomerBrowse;
use App\Http\Livewire\Customer\Details as CustomerDetails;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Invoice\Index as InvoiceIndex;
use App\Http\Livewire\License\Validate;
use App\Http\Livewire\Profile as LivewireProfile;
use App\Http\Livewire\Provider\Browse;
use App\Http\Livewire\Provider\Details;
use App\Http\Livewire\Sale\Index as SaleIndex;
use App\Http\Livewire\Staff\Role\Browse as RoleBrowse;
use App\Http\Livewire\Staff\User\Browse as UserBrowse;
use App\Http\Livewire\Stock\Category\Browse as CategoryBrowse;
use App\Http\Livewire\Stock\Index;
use App\Http\Livewire\Stock\Product\Browse as ProductBrowse;
use App\Http\Livewire\Stock\Purchase\Purchase;
use App\Http\Livewire\Stock\Service\Browse as ServiceBrowse;
use App\Http\Middleware\CompanySetupMiddleware;
use App\Http\Middleware\HasSetupProfile;
use App\Http\Middleware\LicenseMiddleware;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware(['auth'])->group(function () {



    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::any('logout', LogoutController::class)
        ->name('logout');

    Route::middleware([HasSetupProfile::class, 'verified'])->group(function () {
        Route::get("auth/profile", Profile::class)->name("auth.profile");
    });

    Route::get('/license/validate', Validate::class)->name('license.validate');


    Route::middleware([CompanySetupMiddleware::class, 'verified', 'checksinglesession', LicenseMiddleware::class])->group(function () {
        Route::get('/', Dashboard::class)->name('home');
        Route::get('/profile', LivewireProfile::class)->name('profile');

        Route::group(['middleware' => ['role:super-admin|admin|warehouse']], function () {
            Route::get('stocks', Index::class)->name("stocks.index");
            Route::get('stocks/purchases', Purchase::class)->name("stocks.purchases");
        });

        Route::group(['middleware' => ['role:super-admin|admin']], function () {
            Route::get('stocks/categories', CategoryBrowse::class)->name("stocks.categories");
            Route::get('stocks/products', ProductBrowse::class)->name("stocks.products");
            Route::get('stocks/services', ServiceBrowse::class)->name("stocks.services");
        });

        Route::group(['middleware' => ['role:super-admin|admin|sale']], function () {
            Route::get('sales', SaleIndex::class)->name("sales.index");
        });
        Route::group(['middleware' => ['role:super-admin|admin|invoice']], function () {
            Route::get('invoices', InvoiceIndex::class)->name("invoices.index");
            Route::get('invoices/cashout', CashoutIndex::class)->name("invoices.cashout");
        });

        Route::group(['middleware' => ['role:super-admin|admin']], function () {
            Route::get('providers', Browse::class)->name("providers.index");
            Route::get('providers/{provider:code}', Details::class)->name("providers.show");
            Route::get('customers', CustomerBrowse::class)->name("customers.index");
            Route::get('customers/{customer:code}', CustomerDetails::class)->name("customers.show");
        });

        Route::group(['middleware' => ['role:super-admin|admin']], function () {
            Route::get("team", UserBrowse::class)->name('team.index');
            Route::get("roles", RoleBrowse::class)->name('team.roles');
        });
    });
});
