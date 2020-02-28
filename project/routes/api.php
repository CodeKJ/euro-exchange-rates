<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * In case you want to execute currency exchange RSS from API
 * http://localhost/api/fetch
 */
Route::get('fetch', function(){
    Artisan::call('fetch:exchange-rates');
});
