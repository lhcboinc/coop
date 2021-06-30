<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Works
    Route::apiResource('works', 'WorksApiController');

    // Offers
    Route::apiResource('offers', 'OffersApiController');

    // Messages
    Route::apiResource('messages', 'MessagesApiController');

    // Categories
    Route::post('categories/media', 'CategoriesApiController@storeMedia')->name('categories.storeMedia');
    Route::apiResource('categories', 'CategoriesApiController');

    // Working Hours
    Route::apiResource('working-hours', 'WorkingHoursApiController');

    // User Images
    Route::apiResource('user-images', 'UserImagesApiController');

    // Work Images
    Route::apiResource('work-images', 'WorkImagesApiController');

    // Feedbacks
    Route::apiResource('feedback', 'FeedbacksApiController');

    // Account Operations
    Route::apiResource('account-operations', 'AccountOperationsApiController');

    // Favourite Users
    Route::apiResource('favourite-users', 'FavouriteUsersApiController');

    // Favourite Works
    Route::apiResource('favourite-works', 'FavouriteWorksApiController');

    // Answers
    Route::post('answers/media', 'AnswersApiController@storeMedia')->name('answers.storeMedia');
    Route::apiResource('answers', 'AnswersApiController');

    // Tutorials
    Route::post('tutorials/media', 'TutorialsApiController@storeMedia')->name('tutorials.storeMedia');
    Route::apiResource('tutorials', 'TutorialsApiController');

    // Verifications
    Route::post('verifications/media', 'VerificationsApiController@storeMedia')->name('verifications.storeMedia');
    Route::apiResource('verifications', 'VerificationsApiController');

    // Pages
    Route::post('pages/media', 'PagesApiController@storeMedia')->name('pages.storeMedia');
    Route::apiResource('pages', 'PagesApiController');
});
