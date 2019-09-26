<?php

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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::get('/forbidden', 'MainController@Forbidden');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/client/home', 'HomeController@index')->name('home');


Route::get('/client/check_domainTH', 'DomainthController@index')->name('check.th');
Route::post('/client/check_domainTH', 'DomainthController@checkdomain')->name('check.thf');
Route::get('/client/getdns', 'DomainthController@getdnsrecord')->name('getdns.th');

Route::get('/client/domain_all', 'DomainController@index')->name('domain.all');
Route::get('/client/{provider}/update_DNS_{domain}', 'DomainController@getdns');
Route::post('/client/update_DNS', 'DomainController@updatedns')->name('update.dns');
Route::get('/client/Add_DNS_Record_{domain}', 'DomainController@dnsrecord')->name('Add.dnsRec');
Route::get('/client/DomainContact_{domain}', 'DomainController@domaincontact');
Route::post('/client/DomainContact_update', 'DomainController@updatecontact')->name('update.contact');


Route::get('/client/global_domain', 'ResellerclubController@index')->name('check.global');
Route::post('/client/global_domain', 'ResellerclubController@check')->name('check.globalf');

