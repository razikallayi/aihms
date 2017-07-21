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

Route::get('test', function(){
	dd('sd');
	foreach(glob($log_directory.'/*.*') as $file) {
    
	}
});



Route::get('/', 'MasterController@index');
Route::get('blog', 'MasterController@blog');
Route::get('about', 'MasterController@about');
Route::get('clinics', 'MasterController@clinics');
Route::get('gallery', 'MasterController@gallery');
Route::get('talks', 'MasterController@talks');
Route::get('doctors', 'MasterController@doctors');
Route::get('booking', 'MasterController@booking');
Route::post('booking', 'MasterController@onlineBooking');
Route::get('career', 'MasterController@career');
Route::post('career', 'MasterController@careerMail');
Route::get('contact', 'MasterController@contact');
Route::post('contact', 'MasterController@contactEnquiry');
Route::get('location', 'MasterController@location');


Auth::routes();

Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth'], function () {

	Route::get('/', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@index');
	Route::get('my-account', 'DashboardController@myAccount');
	Route::put('my-account', 'DashboardController@updateAccount');

//Banner Images

	Route::get('banners','BannerController@index');
	Route::get('banners/add','BannerController@create');

	Route::post('banners','BannerController@store');
	//Route::get('banners/{id}/edit','BannerController@edit');
	Route::get('banner/{id}/edit','BannerController@edit');
	Route::put('banner-update/{id}','BannerController@update');
	Route::delete('banner/{id}','BannerController@destroy');
	Route::delete('banners/delete','BannerController@deleteImage');
	Route::post('banners/sort','BannerController@sort');
	Route::post('banner/upload-image','BannerController@uploadImage');

	//clinic

	Route::get('clinics','ClinicController@index');
	Route::get('clinics/add','ClinicController@create');
	Route::post('clinics','ClinicController@store');
			//Route::get('clinics/{id}/edit','ClinicController@edit');
	Route::get('clinic/{id}/edit','ClinicController@edit');
	Route::put('clinic-update/{id}','ClinicController@update');
	Route::delete('clinic/{id}','ClinicController@destroy');
	Route::post('clinics/sort','ClinicController@sort');
	Route::post('clinic/upload-image','ClinicController@uploadImage');




//Locations

	Route::get('location','LocationController@index');
	Route::post('add-location','LocationController@add');
	Route::get('manage-location','LocationController@manage');
	Route::get('edit-location/{id}','LocationController@edit');
	Route::put('location/{id}','LocationController@update');
	Route::delete('location/{id}','LocationController@delete');


// departments

	Route::get('department','DepartmentController@index');
	Route::post('add-department','DepartmentController@add');
	Route::get('manage-department','DepartmentController@manage');
	Route::get('department/{id}/edit','DepartmentController@edit');
	Route::put('department-update/{id}','DepartmentController@update');
	Route::delete('department/{id}','DepartmentController@delete');

// place

	Route::get('place','PlaceController@index');
	Route::post('add-place','PlaceController@savePlace');
	Route::get('manage-place','PlaceController@manage');
	Route::get('place/{id}/edit','PlaceController@edit');
	Route::put('place-update/{id}','PlaceController@update');
	Route::delete('place/{id}','PlaceController@delete');

// doctors

	Route::get('doctor','DoctorController@index');
	Route::post('add-doctor','DoctorController@add');
	Route::post('doctor/upload-image','DoctorController@upload');
	Route::get('manage-doctor','DoctorController@manage');
	Route::get('edit-doctor/{id}','DoctorController@edit');
	Route::put('update-doctor/{id}','DoctorController@update');
	Route::delete('doctor/{id}','DoctorController@delete');

	
// gallery
	Route::get('gallery','GalleryController@index');
	Route::get('gallery/add','GalleryController@create');
	Route::post('gallery','GalleryController@store');
	Route::put('gallery/{id}','GalleryController@update');
	Route::delete('gallery/{id}','GalleryController@destroy');
	Route::delete('gallery/delete','GalleryController@deleteImage');
	Route::post('gallery/sort','GalleryController@sort');
	Route::post('gallery/upload-image','GalleryController@uploadImage');

// Talks
	Route::get('talks','TalkController@index');
	Route::get('talks/add','TalkController@create');
	Route::post('talks','TalkController@store');
	Route::get('talks/{id}/edit','TalkController@edit');
	Route::put('talks/{id}','TalkController@update');
	Route::delete('talks/{id}','TalkController@destroy');
	Route::post('talks/sort','TalkController@sort');



	});
