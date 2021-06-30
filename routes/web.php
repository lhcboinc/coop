<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Works
    Route::delete('works/destroy', 'WorksController@massDestroy')->name('works.massDestroy');
    Route::resource('works', 'WorksController');

    // Offers
    Route::delete('offers/destroy', 'OffersController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OffersController');

    // Messages
    Route::delete('messages/destroy', 'MessagesController@massDestroy')->name('messages.massDestroy');
    Route::resource('messages', 'MessagesController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoriesController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoriesController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoriesController');

    // Working Hours
    Route::delete('working-hours/destroy', 'WorkingHoursController@massDestroy')->name('working-hours.massDestroy');
    Route::resource('working-hours', 'WorkingHoursController');

    // User Images
    Route::delete('user-images/destroy', 'UserImagesController@massDestroy')->name('user-images.massDestroy');
    Route::resource('user-images', 'UserImagesController');

    // Work Images
    Route::delete('work-images/destroy', 'WorkImagesController@massDestroy')->name('work-images.massDestroy');
    Route::resource('work-images', 'WorkImagesController');

    // Feedbacks
    Route::delete('feedback/destroy', 'FeedbacksController@massDestroy')->name('feedback.massDestroy');
    Route::resource('feedback', 'FeedbacksController');

    // Account Operations
    Route::delete('account-operations/destroy', 'AccountOperationsController@massDestroy')->name('account-operations.massDestroy');
    Route::resource('account-operations', 'AccountOperationsController');

    // Favourite Users
    Route::delete('favourite-users/destroy', 'FavouriteUsersController@massDestroy')->name('favourite-users.massDestroy');
    Route::resource('favourite-users', 'FavouriteUsersController');

    // Favourite Works
    Route::delete('favourite-works/destroy', 'FavouriteWorksController@massDestroy')->name('favourite-works.massDestroy');
    Route::resource('favourite-works', 'FavouriteWorksController');

    // Answers
    Route::delete('answers/destroy', 'AnswersController@massDestroy')->name('answers.massDestroy');
    Route::post('answers/media', 'AnswersController@storeMedia')->name('answers.storeMedia');
    Route::post('answers/ckmedia', 'AnswersController@storeCKEditorImages')->name('answers.storeCKEditorImages');
    Route::resource('answers', 'AnswersController');

    // Tutorials
    Route::delete('tutorials/destroy', 'TutorialsController@massDestroy')->name('tutorials.massDestroy');
    Route::post('tutorials/media', 'TutorialsController@storeMedia')->name('tutorials.storeMedia');
    Route::post('tutorials/ckmedia', 'TutorialsController@storeCKEditorImages')->name('tutorials.storeCKEditorImages');
    Route::resource('tutorials', 'TutorialsController');

    // Verifications
    Route::delete('verifications/destroy', 'VerificationsController@massDestroy')->name('verifications.massDestroy');
    Route::post('verifications/media', 'VerificationsController@storeMedia')->name('verifications.storeMedia');
    Route::post('verifications/ckmedia', 'VerificationsController@storeCKEditorImages')->name('verifications.storeCKEditorImages');
    Route::resource('verifications', 'VerificationsController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
