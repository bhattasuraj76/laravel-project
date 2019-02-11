<?php

//namespace assigned to group means they have controllers inside same mentioned namespace

Route::group(['namespace' => 'Client'], function () {

    Route::any('/', 'ApplicationController@index')->name('home');

    Route::any('/about', 'ApplicationController@about')->name('about');

    Route::any('/datascience', 'ApplicationController@datascience')->name('datascience');

    Route::any('/blog/{bid?}', 'ApplicationController@blog')->name('blog');

    Route::any('/subscribe', 'ApplicationController@subscribe')->name('subscribe');

    Route::any('/contact', 'ApplicationController@contact')->name('contact');

    Route::any('/login', 'ApplicationController@login')->name('login');

});

Route::group(['namespace' => 'Server'], function () {

    Route::any('login', 'UserController@login')->name('login');

    Route::any('logout', 'UserController@logout')->name('logout');


});

Route::group(['namespace' => 'Server', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
// auth is coustomized and setting in auth.php must be edited ie user class must be on same path and it must
// be extended by User class as it authticates users based on ones inserted via user class

    Route::any('/', 'DashboardController@index')->name('admin');

    Route::group(['prefix' => 'users', 'middleware' => 'status'], function () {

        Route::any('/', 'UserController@index')->name('users');

        Route::any('/addUser', 'UserController@addUser')->name('addUser');

        Route::any('/deleteUser/{uid?}', 'UserController@deleteUser')->name('deleteUser');

        Route::any('/editUser/{uid?}', 'UserController@editUser')->name('editUser');

        Route::any('/editUserAction', 'UserController@editUserAction')->name('editUserAction');

        Route::any('/changeUserType', 'UserController@userTypeChanger')->name('userTypeChanger');

        Route::any('userSearch', 'UserController@userSearch')->name('userSearch');
    });

    Route::group(['prefix'=>'cats'],function(){

        Route::any('/','CategoryController@index')->name('category');

        Route::any('/addCat','CategoryController@addCategory')->name('addCategory');

        Route::any('/deleteCat/{cid?}','CategoryController@deleteCategory')->name('deleteCategory');
    });

    Route::group(['prefix'=>'menus'],function(){

        Route::any('/','MenuController@index')->name('menus');

        Route::any('/addMenu','MenuController@addMenu')->name('addMenu');

        Route::any('/deleteMenu/{mid?}','MenuController@deleteMenu')->name('deleteMenu');
    });

    Route::group(['prefix'=>'posts'],function(){

        Route::any('/','PostController@index')->name('posts');

        Route::any('/addPost','PostController@addPost')->name('addPost');

        Route::any('/deletePost/{pid?}','PostController@deletePost')->name('deletePost');

        Route::any('/editPost/{pid?}','PostController@editPost')->name('editPost');

        Route::any('/editPostAction','PostController@editPostAction')->name('editPostAction');
    });

    Route::group(['prefix'=>'subscribers','middleware'=>'status'],function(){

        Route::any('/','SubscriberController@index')->name('subscribers');

        Route::any('/subscriberSearch','SubscriberController@subscriberSearch')->name('subscriberSearch');

        Route::any('/emailSubscriber/{sid?}','SubscriberController@emailSubscriber')->name('emailSubscriber');

        Route::any('/deleteSubscriber/{sid?}','SubscriberController@deleteSubscriber')->name('deleteSubscriber');
    });



});