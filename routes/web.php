<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('api/create-user/','UserController@create');
$router->post('api/login/','UserController@authenticate');
$router->group(['prefix' => 'api/', 'middleware' => 'auth'], function() use ($router)
{

    $router->group(['prefix' => 'profile/'], function() use ($router)
    {
        $router->post('create/','ProfileController@create');
        $router->get('get/','ProfileController@read');
        $router->post('delete/{id}','ProfileController@delete');
    });


    $router->group(['prefix' => 'branch/'], function() use ($router)
    {
        $router->post('create/','BranchController@create');
        $router->get('get/{profile-id}','BranchController@read');
        $router->post('delete/{id}','BranchController@delete');
    });


    $router->group(['prefix' => 'category/'], function() use ($router)
    {
        $router->post('create/','CategoryController@create');
        $router->get('get/','CategoryController@read');
        $router->post('delete/{id}','CategoryController@delete');
    });


    $router->group(['prefix' => 'company/'], function() use ($router)
    {
        $router->post('create/','CompanyController@create');
        $router->get('get/','CompanyController@read');
        $router->post('delete/{id}','CompanyController@delete');
    });


    $router->group(['prefix' => 'contact/'], function() use ($router)
    {
        $router->post('create/','ContactController@create');
        $router->get('get/','ContactController@read');
        $router->post('delete/{id}','ContactController@delete');
    });


    $router->group(['prefix' => 'crop/'], function() use ($router)
    {
        $router->post('create/','CropController@create');
        $router->get('get/{profile_id}','CropController@read');
        $router->post('delete/{id}','CropController@delete');
    });


    $router->group(['prefix' => 'email/'], function() use ($router)
    {
        $router->post('create/','EmailController@create');
        $router->get('get/{contact_id}','EmailController@read');
        $router->post('delete/{id}','EmailController@delete');
    });


    $router->group(['prefix' => 'general/'], function() use ($router)
    {
        $router->post('create/','GeneralController@create');
        $router->get('get/{id}','GeneralController@read');
        $router->post('delete/{id}','GeneralController@delete');
    });


    $router->group(['prefix' => 'goal/'], function() use ($router)
    {
        $router->post('create/','GoalController@create');
        $router->get('get/','GoalController@read');
        $router->post('delete/{id}','GoalController@delete');
    });


    $router->group(['prefix' => 'number/'], function() use ($router)
    {
        $router->post('create/','NumberController@create');
        $router->get('get/{contact_id}','NumberController@read');
        $router->post('delete/{id}','NumberController@delete');
    });


    $router->group(['prefix' => 'photo/'], function() use ($router)
    {
        $router->post('create/','PhotoController@create');
        $router->get('get/{report_id}','PhotoController@read');
        $router->post('delete/{id}','PhotoController@delete');
    });


    $router->group(['prefix' => 'post/'], function() use ($router)
    {
        $router->post('create/','PostController@create');
        $router->get('get/','PostController@read');
        $router->post('delete/{id}','PostController@delete');
    });


    $router->group(['prefix' => 'product/'], function() use ($router)
    {
        $router->post('create/','ProductController@create');
        $router->get('get/{profile_id}','ProductController@read');
        $router->post('delete/{id}','ProductController@delete');
    });


    $router->group(['prefix' => 'questionnaire/'], function() use ($router)
    {
        $router->post('create/','QuestionnaireController@create');
        $router->get('get/{user_id}','QuestionnaireController@read');
        $router->post('delete/{id}','QuestionnaireController@delete');
    });

    $router->group(['prefix' => 'report/'], function() use ($router)
    {
        $router->post('create/','ReportController@create');
        $router->get('get/{user_id}','ReportController@read');
        $router->post('delete/{id}','ReportController@delete');
    });
});
