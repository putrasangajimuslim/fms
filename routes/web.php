<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\CustomerController;

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
Route::resource('campaign', CampaignController::class);
Route::controller(CustomerController::class)->group(function(){
    Route::resource('customer', CustomerController::class)->except(['show']);
    Route::post('customer/upload', 'upload')->name('customer.upload');
});
// Route::resource('customer', CustomerController::class);
// Route::post('upload', [CustomerController::class, 'upload']);
// Route::post('customer/upload', [CustomerController::class, 'upload'])->name('upload');
// Route::controller(CustomerController::class)->group(function(){
//     Route::post('upload', 'upload');
// });
// Route::post('upload', 'CustomerController@upload');
Route::resource('distribute', DistributeController::class);
Route::resource('report', ReportController::class);

// Route::get('customer',  function () {
//     return view('admin.upload.index', [
//         'list_transactions' => App\Models\Customer::all()
//     ]);
// });

// Route::namespace('Admin')->group(function () {
//     // Route::resource('campaign', [App\Http\Controllers\Admin\CampaignController::class, 'index']);
//     Route::get('/campaign', [App\Http\Controllers\Admin\CampaignController::class, 'index'])->name('campaign');
//     Route::post('/campaign/create', [App\Http\Controllers\Admin\CampaignController::class, 'create'])->name('campaign');
//     Route::post('/campaign', [App\Http\Controllers\Admin\CampaignController::class, 'edit'])->name('campaign');
//     // Route::resource('upload', 'TransactionController');
//     // Route::resource('distribute', 'TransactionController');
//     // Route::resource('report', 'TransactionController');
// });

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/home', 'HomeController@index');
// });

// Route::get('/', function () {
//     return view('dashboard', [
//         'list_transactions' => App\Models\Customer::all()
//     ]);
// });

// Route::post('import', function () {

//     $fileName = time() . '_' . request()->file->getClientOriginalName();
//     request()->file('file')->storeAs('reports', $fileName, 'public');

//     Excel::import(new CustomersImport, request()->file('file'));
//     return redirect()->back()->with('success', 'Data Imported Successfully');
// });
