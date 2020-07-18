<?php
// Grade
Route::get('grade/list', 'Grade\GradeController@list')->name('grade.list');
Route::resource('grade', 'Grade\GradeController');

// Section
Route::get('section/list', 'Section\SectionController@list')->name('section.list');
Route::resource('section', 'Section\SectionController');

// Subject
Route::get('subject/list', 'Subject\SubjectController@list')->name('subject.list');
Route::resource('subject', 'Subject\SubjectController');

// Email Template
Route::get('email_template/list', 'EmailTemplate\EmailTemplateController@list')->name('email-template.list');
Route::resource('email_template', 'EmailTemplate\EmailTemplateController');

// Student
Route::get('/student/list', 'Student\StudentController@list')->name('student.list');
Route::resource('student', 'Student\StudentController');

// Discount Package
Route::get('discount_package/list', 'DiscountPackageController@list')->name('discount_package.list');
Route::resource('discount_package', 'DiscountPackageController');

// Fee
Route::get('fee/list', 'Fees\FeeController@list')->name('discount_package.list');
Route::resource('fee', 'Fees\FeeController');

// Fee Category
Route::get('fee_category/list', 'Fees\FeeCategoryController@list')->name('discount_package.list');
Route::resource('fee_category', 'Fees\FeeCategoryController');

// Installment
Route::get('installment/list', 'Fees\InstallmentController@list')->name('discount_package.list');
Route::resource('installment', 'Fees\InstallmentController');

//  Library
Route::name('library.')->group(function () {
    //  Category
    Route::get('library/category/list', 'Library\CategoryController@list')->name('category.list');
    Route::resource('library/category', 'Library\CategoryController');

    //  Book
    Route::get('library/book/list', 'Library\BookController@list')->name('book.list');
    Route::resource('library/book', 'Library\BookController');

    //  Issued
    Route::get('library/issued/list', 'Library\IssuedController@list')->name('issued.list');
    Route::get('library/issued-books', 'Library\IssuedController@index')->name('issued.books.index');
    Route::get('library/issue-book', 'Library\IssuedController@create')->name('issue.book.create');
    Route::post('library/issue-book', 'Library\IssuedController@store')->name('issue.book.store');
    Route::get('library/issued/{id}/edit', 'Library\IssuedController@edit')->name('issued.book.edit');
    Route::put('library/issued-book/{id}', 'Library\IssuedController@update')->name('issued.book.update');

//        Route::resource('library/issued-book', 'Library\IssuedController');

    //  Returned
    Route::get('library/returned-book/list', 'Library\ReturnedController@list')->name('returned-book.list');
    Route::resource('library/returned-book', 'Library\ReturnedController');
});

// Calendar
Route::name('calendar.')->group(function () {
    Route::get('calendar/group/list', 'Calendar\GroupController@list')->name('group.list');
    Route::resource('calendar/group', 'Calendar\GroupController');
    Route::get('calendar', 'Calendar\CalendarController@index')->name('index');
});

    // Canteen
    Route::get('canteen/list', 'Canteen\CanteenController@list')->name('canteen.list');
    Route::resource('canteen', 'Canteen\CanteenController');

    // vehicle
    Route::get('vehicle/list', 'Vehicle\VehicleController@list')->name('vehicle.list');
    Route::resource('vehicle', 'Vehicle\VehicleController');

    // route
    Route::get('route/list', 'Route\RouteController@list')->name('route.list');
    Route::resource('route', 'Route\RouteController');

    // Teachers
    Route::get('teacher/list', 'Teacher\TeacherController@list')->name('teacher.list');
    Route::resource('teacher', 'Teacher\TeacherController');

    // Driver
    Route::get('driver/list', 'Driver\DriverController@list')->name('teacher.list');
    Route::resource('driver', 'Driver\DriverController');

