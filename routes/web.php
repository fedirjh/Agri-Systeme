<?php

use App\Http\Livewire\AdminController;
use App\Http\Livewire\Agronomic\AgriculteurController;
use App\Http\Livewire\Agronomic\ResponsableController;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Logistics\BenneController;
use App\Http\Livewire\Logistics\TransporteurController;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Profile;
use App\Http\Livewire\RapportController;
use App\Http\Livewire\RoleController;
use App\Http\Livewire\RTL;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Stock\EntityController;
use App\Http\Livewire\Stock\LivraisonController;
use App\Http\Livewire\Tables;
use App\Http\Livewire\VirtualReality;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect('sign-in');
});

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');

Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');


Route::group(['middleware' => 'admin'], function () {

    Route::get('admins', AdminController::class)->name('admins');
    Route::get('roles', RoleController::class)->name('roles');

    Route::get('responsables', ResponsableController::class)->name('responsables');
    Route::get('agriculteurs', AgriculteurController::class)->name('agriculteurs');

    Route::get('transporteurs', TransporteurController::class)->name('transporteurs');
    Route::get('bennes', BenneController::class)->name('bennes');

    Route::get('entities', EntityController::class)->name('entities');
    Route::get('livraisons', LivraisonController::class)->name('livraisons');
    Route::get('rapports', RapportController::class)->name('rapports');
    Route::get('dashboard', Dashboard::class)->name('dashboard');

});


















Route::get('user-profile', UserProfile::class)->middleware('admin')->name('user-profile');
Route::get('user-management', UserManagement::class)->middleware('admin')->name('user-management');
Route::get('billing', Billing::class)->name('billing');
  Route::get('profile', Profile::class)->name('profile');
  Route::get('tables', Tables::class)->name('tables');
  Route::get('notifications', Notifications::class)->name("notifications");
  Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
  Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
  Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
  Route::get('rtl', RTL::class)->name('rtl');


/*Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UsersController');
Route::get('export', 'CalculController@indexx')->name('indexx');
Route::delete('DeleteAll', 'CalculController@deleteAll')->name('DeleteAll');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);


    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});
Route::redirect('/', 'admin/home');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::resource('rapport','RapportController');
Route::get('export', 'RapportController@indexx')->name('indexx');
Route::delete('DeleteAll', 'TransporteurController@deleteAll')->name('DeleteAll');
Route::get('Exports', 'TransporteurController@indexx')->name('indexx');
Route::get('Bennes', 'BenneController@Bennes')->name('bennes');
// Route::put('ChangeStatus/{transporteur}', 'TransporteurController@Inactive')->name('Inactive');
// Route::put('Change/{transporteur}', 'TransporteurController@Active')->name('Active');

Route::get('/home','HomeController@index')->name('home');
Route::get('/shwo/{transporteur}','TransporteurController@afficher')->name('afficher');
Route::get('/affete','BenneController@affecter')->name('benne.benneAffecter');
Route::get('/nonaffete','BenneController@nonAffecter')->name('benne.benneNonAffecter');
Route::post('/affete','BenneController@storeTransporteur')->name('benne.storeTransporteur');
Route::get('/homee','HomeController@index');
Route::get('generate-pdf','BenneController@generatePDF')->name('generatePDF');
Route::get('ExportView', 'TransporteurController@iExportView');
Route::get('export', 'BenneController@export')->name('export');
Route::get('pdf-file','BenneController@generatePDF')->name('generatePDF');
Route::get('ExportView', 'TransporteurController@iExportView');
Route::get('exports', 'TransporteurController@exports')->name('exports');

Route::resource('trans','TransporteurController');
Route::resource('benne','BenneController');
Route::resource('agri','AgriculteurController');
Route::get('/affect','AgriculteurController@affect')->name('agri.agriAffect');
Route::get('/nonaffect','AgriculteurController@nonAffect')->name('agri.agriNonAffect');
Route::post('/affect','AgriculteurController@storeResponsable')->name('agri.storeResponsable');
Route::get('/export-pdf','TransporteurController@PDF')->name('exportPdf');
Route::resource('responsable','ResponsableController');*/
