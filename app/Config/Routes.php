<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::homePage', ['as' => 'home-page']);


// $routes->get('admin', 'Admin\ProductController::index');
// $routes->get('/admin', 'ProductController::index', ['namespace' => 'App\Controllers\Admin']);
$routes->group('', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/admin', 'ProductController::index');
    $routes->get('/admin/view', 'ProductController::view');
});

$routes->get('/placeholder/(.*)/and/(.*)/then/(.*)', 'Home::placeholder/$1/$2/$3');

$routes->group('', ['filter' => 'guest'], function ($routes) {
    $routes->get('/register', 'Auth\RegisterController::index', ['as' => 'register-view']);
    $routes->post('/register', 'Auth\RegisterController::auth', ['as' => 'register']);

    $routes->get('/login', 'Auth\LoginController::index', ['as' => 'login-view']);
    $routes->post('/login', 'Auth\LoginController::auth', ['as' => 'login']);
});

$routes->group('', ['filter' => 'auth'], function ($routes) {

    $routes->group('', ['filter' => 'isAdmin'], function ($routes) {
        $routes->get('admin/home', 'Home::adminHome', ['as' => 'admin-home']);
    });

    $routes->group('', ['filter' => 'isEmployee'], function ($routes) {
        $routes->get('employee/home', 'Home::employeeHome', ['as' => 'employee-home']);
    });

    $routes->get('/user', 'UserController::index', ['as' => 'user-view']);
    $routes->get('/user/new', 'UserController::new');
    $routes->post('/user', 'UserController::create');
    $routes->get('/user/(:num)/edit', 'UserController::edit/$1');
    $routes->post('/user/(:num)', 'UserController::update/$1');
    $routes->get('/user/(:num)/delete', 'UserController::delete/$1');
    $routes->get('/logout', 'Auth\LoginController::logout', ['as' => 'logout']);
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
