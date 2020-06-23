<?php

Route::get('/', 'StudentController@index')->name('index');

Route::middleware('student.is_published')->group(function () {
    Route::get('/dashboard', 'StudentController@dashboard')->name('index');
});
