<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
        'client_id' => 'client-id',
        'redirect_uri' => 'http://example.com/callback',
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
    ]);

    return redirect('https://accounts.zoho.com/oauth/v2/auth?'.$query);
});


Route::get('/callback', function (Request $request) {
    $state = $request->session()->pull('state');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    $http = new GuzzleHttp\Client;

    $response = $http->post('http://your-app.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 'client-id',
            'client_secret' => 'client-secret',
            'redirect_uri' => 'http://example.com/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

Route::get('/callback', function (Request $request) {
    $state = $request->session()->pull('state');

    $codeVerifier = $request->session()->pull('code_verifier');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    $response = (new GuzzleHttp\Client)->post('http://your-app.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 'client-id',
            'redirect_uri' => 'http://example.com/callback',
            'code_verifier' => $codeVerifier,
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});


Route::get('', function (Request $request) {
$http = new GuzzleHttp\Client;

$response = $http->post('http://your-app.com/oauth/token', [
    'form_params' => [
        'grant_type' => 'refresh_token',
        'refresh_token' => 'the-refresh-token',
        'client_id' => 'client-id',
        'client_secret' => 'client-secret',
        'scope' => '',
    ],
]);

return json_decode((string) $response->getBody(), true);

});


// Route::get('/admin','AdminController@index')->name('Admin');

Route::get('/test', function () {
    return 'Hello World';
});





Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::middleware(['verified', 'auth'])->group(function () {

    Route::get('invoices', 'InvoiceController@index')->name('invoice');
    Route::get('reports', 'ReportController@index')->name('reports');
    Route::get('/home', 'HomeController@index')->name('home');

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

        //Invoices Routes


        });
        });


