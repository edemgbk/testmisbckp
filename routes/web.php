<?php

use Illuminate\Support\Facades\Route;
// namespace App;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//file upload
// Route::get('file-upload', 'FileUploadController@fileUpload')->name('file.upload');
// Route::post('file-upload', 'FileUploadController@fileUploadPost')->name('file.upload.post');
Route::get('file','FileController@index');

//insert files/images into mysql database table laravel
Route::post('file-upload','FileController@fileSave');


Route::get('/newsidebar','AdminController@index')->name('newsidebar');

// Route::get('/test', function () {
//     return 'Hello World';
// });

Route::post('file-upload', 'SubmitReportController@Upload')->name('reportupload');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::middleware(['verified', 'auth'])->group(function () {

    Route::get('invoices', 'InvoiceController@index')->name('invoice');
//reports
    Route::get('reports', 'ReportController@index')->name('reports');
    Route::get('report/{id}/edit', 'ReportController@edit')->name('reports.edit');
    Route::delete('report/delete', 'ReportController@delete')->name('reports.delete');
    Route::put('report/{id}/update', 'ReportController@update')->name('reports.update');
    Route::post('report/create', 'ReportController@create')->name('reports.create');
    // Route::put('report/{id}/approve', 'ReportController@approve')->name('reports.approve');

    Route::get('reports/{id}/view', 'ReportController@index')->name('reports.view');

    Route::get('/downloadPDF/{id}','ReportController@downloadPDF');
    Route::get('export', 'ReportController@export');

    Route::get('/send-email', 'MailController@sendEmail')->name('mail');
    Route::get('sendnotif', 'MailController@sendNotification');


    // Route::get('/Dashboard', 'HomeController@index')->name('home');
    Route::get('customers', 'CustomerController@index')->name('customer');
    Route::get('items', 'ItemController@index')->name('item');

    Route::get('applications', 'applicationsController@index')->name('applications');

    Route::get('Search', 'Controller@index')->name('');
    Route::get('Dashboard', 'HomeController@index')->name('home');
    Route::get('AdminPanel', 'AdminPanelController@index')->name('AdminPanel');

    });

         //Invoices Routes

    Route::prefix('invoice')->name('invoice.')->group(function () {

        Route::middleware(['verified', 'auth'])->group(function () {

         Route::get('invoices', 'InvoiceController@index')->name('invoice');
        // Route::get('reports', 'InvoiceController@index')->name('reports');
        Route::get('customers', 'InvoiceCustomerController@index')->name('customer');
        Route::get('items', 'InvoiceController@index')->name('item');


        });
        });


        Route::prefix('docsign')->name('docsign.')->group(function () {

            Route::middleware(['verified', 'auth'])->group(function () {

             Route::get('sign', 'DocsignController@sign')->name('sign');
            Route::get('documents', 'DocsignController@index')->name('document');
            Route::get('templates', 'DocsignController@index')->name('template');
            Route::get('signForms', 'DocsignController@signForm')->name('signinform');
            Route::get('reports', 'DocsignController@index')->name('report');


            });
            });
    Route::prefix('expenses')->name('expenses.')->group(function () {

        Route::middleware(['verified', 'auth'])->group(function () {
        Route::get('expense/view', 'ExpenseController@view')->name('view');
        Route::post('expense/create', 'ExpenseController@create')->name('create');
        Route::get('expense/{id}/edit', 'ExpenseController@edit')->name('edit');
        Route::get('expense/{id}/view', 'ExpenseController@view')->name('view');
        Route::delete('expense/delete', 'ExpenseController@delete')->name('delete');
        Route::put('expense/{id}/update', 'ExpenseController@update')->name('update');

         Route::get('expenses', 'ExpenseController@index')->name('expenses');
        // Route::get('reports', 'InvoiceController@index')->name('reports');
        // Route::get('customers', 'InvoiceCustomerController@index')->name('customer');
        // Route::get('items', 'InvoiceController@index')->name('item');
        });
        });





        Route::prefix('reports')->name('reports.')->group(function () {

            Route::middleware(['verified', 'auth'])->group(function () {
            Route::get('reports/{id}/view', 'ReportController@view')->name('view');
             Route::get('reports', 'ReportController@index')->name('reports');
            // Route::get('documents', 'DocsignController@index')->name('document');
            // Route::get('templates', 'DocsignController@index')->name('template');
            // Route::get('signForms', 'DocsignController@signForm')->name('signinform');
            // Route::get('reports', 'DocsignController@index')->name('report');
            });
            });




    Route::prefix('user-management')->name('user-management.')->group(function () {

        Route::middleware(['verified', 'auth'])->group(function () {

        //Users Routes
        Route::get('users', 'UserController@index')->name('users');

        Route::get('user/my-profile', 'UserController@profile')->name('user.my_profile');
        Route::put('user/{id}/edit_profile', 'UserController@edit_user')->name('user.edit_user');
        Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
        Route::delete('user/delete', 'UserController@delete')->name('user.delete');
        Route::put('user/{id}/update', 'UserController@update')->name('user.update');
        Route::post('user/create', 'UserController@create')->name('user.create');

        //Permissions Routes
        Route::get('permissions', 'PermissionsController@index')->name('permissions');
        Route::post('permissions/create', 'PermissionsController@create')->name('permissions.create');

        Route::get('permissions/{id}/edit', 'PermissionsController@edit')->name('permissions.edit');
        Route::put('permissions/{id}/update', 'PermissionsController@update')->name('permissions.update');
        Route::delete('permissions/delete', 'PermissionsController@delete')->name('permissions.delete');

        //Roles Routes
        Route::get('roles', 'RolesController@index')->name('roles');
        Route::post('roles/create', 'RolesController@create')->name('roles.create');
        Route::get('roles/{id}/edit', 'RolesController@edit')->name('roles.edit');
        Route::get('role/{id}/view', 'RolesController@view')->name('roles.view');
        Route::delete('role/delete', 'RolesController@delete')->name('roles.delete');

        Route::get('roles/newFormView', 'RolesController@emptyForm')->name('roles.emptyForm');
        Route::put('roles/{id}/update', 'RolesController@update')->name('roles.update');

      //categories Routes
      Route::get('categories', 'categoriesController@index')->name('categories');
      Route::post('categories/create', 'CategoriesController@create')->name('categories.create');
    Route::get('categories/view', 'CategoriesController@view')->name('categories.view');
      Route::get('categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
      Route::put('categories/{id}/update', 'CategoriesController@update')->name('categories.update');
      Route::delete('categories/delete', 'CategoriesController@delete')->name('categories.delete');


      //merchants
      Route::get('merchants', 'MerchantsController@index')->name('merchants');
      Route::post('merchants/create', 'MerchantsController@create')->name('merchants.create');
      Route::get('merchants/{id}/view', 'MerchantsController@view')->name('merchants.view');
      Route::get('merchants/{id}/edit', 'MerchantsController@edit')->name('merchants.edit');
      Route::put('merchants/{id}/update', 'MerchantsController@update')->name('merchants.update');
      Route::delete('merchants/delete', 'MerchantsController@delete')->name('merchants.delete');

      //customers
      Route::get('customers', 'CustomersController@index')->name('customers');
      Route::post('customers/create', 'CustomersController@create')->name('customers.create');
      Route::get('customers/{id}/view', 'CustomersController@view')->name('customers.view');

      Route::get('customers/{id}/edit', 'CustomersController@edit')->name('customers.edit');
      Route::put('customers/{id}/update', 'CustomersController@update')->name('customers.update');
      Route::delete('customers/delete', 'CustomersController@delete')->name('customers.delete');


//currencies

Route::get('currencies', 'currenciesController@index')->name('currencies');
Route::post('currencies/create', 'currenciesController@create')->name('currencies.create');
Route::post('currencies/view', 'currenciesController@view')->name('currencies.view');

Route::get('currencies/{id}/edit', 'currenciesController@edit')->name('currencies.edit');
Route::put('currencies/{id}/update', 'currenciesController@update')->name('currencies.update');
Route::delete('currencies/delete', 'currenciesController@delete')->name('currencies.delete');



Route::get('paidthrough', 'PaidthroughController@index')->name('paidthrough');
Route::post('paidthrough/create', 'PaidthroughController@create')->name('paidthrough.create');
Route::post('paidthrough/view', 'PaidthroughController@view')->name('paidthrough.view');

Route::get('paidthrough/{id}/edit', 'PaidthroughController@edit')->name('paidthrough.edit');
Route::put('paidthrough/{id}/update', 'PaidthroughController@update')->name('paidthrough.update');
Route::delete('paidthrough/delete', 'PaidthroughController@delete')->name('paidthrough.delete');


Route::get('accounttype', 'AccounttypeController@index')->name('accounttype');
Route::post('accounttype/create', 'AccounttypeController@create')->name('accounttype.create');
Route::get('accounttype/{id}/view', 'AccounttypeController@view')->name('accounttype.view');

Route::get('accounttype/{id}/edit', 'AccounttypeController@edit')->name('accounttype.edit');
Route::put('accounttype/{id}/update', 'AccounttypeController@update')->name('accounttype.update');
Route::delete('accounttype/delete', 'AccounttypeController@delete')->name('accounttype.delete');

        });
        });

Route::get('test',function(){

// $expenses=\App\Expense::with('reports')->get();
// $reports=\App\Report::with('expenses')->get();

// $expense=\App\Expense::create([
//      =>
// ]);
// categories
// $expense=\App\Expense::find(1);
// dd($expense->reports);

// $reports=\App\Report::all();
// dd($report->expenses);

$report=\App\Report::find(1);

$u=$report->expenses()->attach([2,3]);
// dd($u);
// return view('test.index');
});


