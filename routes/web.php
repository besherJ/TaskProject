<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;


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

Route::get('/', function () {


    if(Auth::check())
    {
      return redirect('welcome');
    }
    return view('login');
})->name('login');


Route::get('/login', function() {
		return redirect()->route('signup');
	});
    Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout')->middleware('auth:api');
   


    // Routes for logged employees
    Route::group(['middleware' => ['auth:api']], function(){
			
			Route::get('welcome' ,function() {
				return view('welcome');
			})->name('welcome');

			Route::get('tasks/edit', 'TaskController@show');


		    Route::get('tasks/edit/{task}', 'TaskController@edit');
    		Route::post('tasks/edit/{task}', 'TaskController@update');  
		}
	);

    		    		
    			
    //Routes for logged admins
    	Route::group(['middleware' => ['auth:api', 'admin']], function(){
    	Route::get('employees/rating' ,'AuthController@empRatings');

    		
    	Route::get('/employees', 'AuthController@show');

 
    	Route::get('/signup', 'AuthController@signup')->name('signup');
    	Route::post('/signup', 'AuthController@create');

   		Route::get('employees/edit/{user}' ,'AuthController@edit');
  		Route::post('employees/edit/{user}' ,'AuthController@update');

      Route::get('employees/delete/{user}' ,'AuthController@delete');

   		Route::get('tasks/create' ,'TaskController@create')
   			->name('tasks.create');
   		Route::post('/tasks/create' ,'TaskController@store')
   				->name('tasks.store');

   		Route::get('employees/upload/{user}' ,'AuthController@upload');
   		Route::post('employees/upload/{user}' ,'AuthController@uploadImage');
		}
	);
