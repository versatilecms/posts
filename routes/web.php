<?php

$namespace = '\Versatile\Posts\Http\Controllers';

Route::group([
    'prefix' => 'posts', // Must match its `slug` record in the DB > `data_types`
    'middleware' => ['web'],
    'as' => 'versatile-posts.posts.',
    'namespace' => $namespace,
], function () {
    Route::get('/', ['uses' => 'FrontPostsController@getPosts', 'as' => 'list']);
    Route::get('{slug}', ['uses' => 'FrontPostsController@getPost', 'as' => 'post']);
});
