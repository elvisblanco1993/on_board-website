<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/**
 * Front Page
 */
Route::get('/', 'WebsiteController@frontpage')->name('frontpage');

/**
 * Downloads
 */
Route::get('download', 'WebsiteController@download')->name('download');

/**
 * Support
 */
Route::get('support', 'SupportController@index')->name('support');

Route::get('support/get-started', 'SupportController@getStarted')->name('supportGetStarted');

/**
 * 02. Finish creating the Support Plan Account.
 */
Route::put('support/get-started', 'SupportController@setupPlan')->middleware('auth');

/**
 * Legal
 */
Route::get('privacy', function () {
    return view('privacy');
});

/**
 * Open Source
 */
Route::get('open-source', function () {
    return view('open-source');
});


/**
 * BACKEND
 */

Auth::routes();

Route::get('/my', 'HomeController@index')->name('my')->middleware('auth');

Route::post('billing', 'BillingController@launchPortal')->middleware('auth');

Route::delete('billing', 'BillingController@cancelSubscription')->middleware('auth');


/**
 * Tickets
 */

Route::get('new-ticket', 'TicketsController@create')->middleware('auth');

Route::post('new-ticket', 'TicketsController@store')->middleware('auth');

Route::get('my-tickets', 'TicketsController@index')->middleware('auth');

Route::get('tickets/{ticket_id}', 'TicketsController@show')->middleware('auth');

/**
 * Tickets Comments
 */
Route::post('comment', 'CommentsController@store')->middleware('auth');


/**
 * Admin Specific Routes
 */

Route::get('tickets', 'TicketsController@viewAll')->middleware('admin');
Route::post('close-ticket/{ticket_id}', 'TicketsController@close')->middleware('admin');
