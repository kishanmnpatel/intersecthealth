<?php

use App\Http\Livewire\AppAnalysis;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignIn;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Datatables;
use App\Http\Livewire\EditCategory;
use App\Http\Livewire\EditItem;
use App\Http\Livewire\EditRole;
use App\Http\Livewire\EditTag;
use App\Http\Livewire\EditUser;
use App\Http\Livewire\Examples\Billing;
use App\Http\Livewire\Examples\Err404;
use App\Http\Livewire\Examples\Err500;
use App\Http\Livewire\Examples\ForgotPasswordExample;
use App\Http\Livewire\Examples\Invoice;
use App\Http\Livewire\Examples\Lock;
use App\Http\Livewire\Examples\Pricing;
use App\Http\Livewire\Examples\ProfileExample;
use App\Http\Livewire\Examples\ResetPasswordExample;
use App\Http\Livewire\Examples\SignInExample;
use App\Http\Livewire\Examples\SignUpExample;
use App\Http\Livewire\Items;
use App\Http\Livewire\Kanban;
use App\Http\Livewire\Map;
use App\Http\Livewire\Messages;
use App\Http\Livewire\NewCategory;
use App\Http\Livewire\NewItem;
use App\Http\Livewire\NewRole;
use App\Http\Livewire\NewTag;
use App\Http\Livewire\NewUser;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Roles;
use App\Http\Livewire\SingleMessage;
use App\Http\Livewire\Tags;
use App\Http\Livewire\Tasks;
use App\Http\Livewire\TrafficSources;
use App\Http\Livewire\Transactions;
use App\Http\Livewire\Users;
use App\Http\Livewire\Widgets;
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

Route::redirect('/', '/sign-in');
Route::get('/sign-in', SignIn::class)->name('sign-in');
Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/kanban', Kanban::class)->name('kanban');
    Route::get('/messages', Messages::class)->name('messages');
    Route::get('/single-message', SingleMessage::class)->name('single-message');
    Route::get('/user-management', Users::class)->name('user-management');
    Route::get('/new-user', NewUser::class)->name('new-user');
    Route::get('/edit-user/{id}', EditUser::class)->name('edit-user');
    Route::get('/role-management', Roles::class)->name('role-management');
    Route::get('/new-role', NewRole::class)->name('new-role');
    Route::get('/edit-role/{id}', EditRole::class)->name('edit-role');
    Route::get('/category-management', Categories::class)->name('category-management');
    Route::get('/new-category', NewCategory::class)->name('new-category');
    Route::get('/edit-category/{id}', EditCategory::class)->name('edit-category');
    Route::get('/tag-management', Tags::class)->name('tag-management');
    Route::get('/new-tag', NewTag::class)->name('new-tag');
    Route::get('/edit-tag/{id}', EditTag::class)->name('edit-tag');
    Route::get('/item-management', Items::class)->name('item-management');
    Route::get('/new-item', NewItem::class)->name('new-item');
    Route::get('/edit-item/{id}', EditItem::class)->name('edit-item');
    Route::get('/transactions', Transactions::class)->name('transactions');
    Route::get('/traffic-sources', TrafficSources::class)->name('traffic-sources');
    Route::get('/app-analysis', AppAnalysis::class)->name('app-analysis');
    Route::get('/tasks', Tasks::class)->name('tasks');
    Route::get('/calendar', Calendar::class)->name('calendar');
    Route::get('/map', Map::class)->name('map');
    Route::get('/datatables', Datatables::class)->name('datatables');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/examples/profile', ProfileExample::class)->name('profile-example');
    Route::get('/examples/pricing', Pricing::class)->name('pricing');
    Route::get('/examples/billing', Billing::class)->name('billing');
    Route::get('/examples/invoice', Invoice::class)->name('invoice');
    Route::get('/examples/sign-in', SignInExample::class)->name('sign-in-example');
    Route::get('/examples/sign-up', SignUpExample::class)->name('sign-up-example');
    Route::get('/examples/forgot-password', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/examples/reset-password', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/examples/lock', Lock::class)->name('lock');
    Route::get('/examples/404', Err404::class)->name('404');
    Route::get('/examples/500', Err500::class)->name('500');
    Route::get('/components/buttons', Buttons::class)->name('buttons');
    Route::get('/components/notifications', Notifications::class)->name('notifications');
    Route::get('/components/forms', Forms::class)->name('forms');
    Route::get('/components/modals', Modals::class)->name('modals');
    Route::get('/components/typography', Typography::class)->name('typography');
    Route::get('/widgets', Widgets::class)->name('widgets');

    Route::middleware(['role:admin'])->prefix('ad')->name('admin.')->group(function () {
        Route::get('home', \App\Http\Livewire\Admin\Home::class)->name('home');
        Route::get('dashboard', Dashboard::class)->name('dashboard');
    });

    Route::middleware(['role:doctor'])->prefix('dr')->name('doctor.')->group(function () {
        Route::get('home', \App\Http\Livewire\Doctor\Home::class)->name('home');
        Route::get('dashboard', Dashboard::class)->name('dashboard');
    });

    Route::middleware(['role:patient'])->prefix('pt')->name('patient.')->group(function () {
        Route::get('home', \App\Http\Livewire\Patient\Home::class)->name('home');
        Route::get('dashboard', Dashboard::class)->name('dashboard');
    });
});
