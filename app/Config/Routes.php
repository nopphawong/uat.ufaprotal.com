<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes @dm1nCent
 */


// PAGE
$routes->get('login', 'Page::login');
$routes->get('logout', 'Page::logout');

$pageauth = ['filter' => 'pageauth'];
$routes->get('/', 'Page::index', $pageauth);
$routes->get('agent/info', 'Page::agent_info', $pageauth);


// SERV
$routes->post('auth/login', 'serv\Auth::login');

$servauth = ['filter' => 'servauth'];
$routes->post('agent/info', 'serv\Agent::info', $servauth);
$routes->post('agent/info/update', 'serv\Agent::info_update', $servauth);


// API
$routes->group('api', static function ($routes) {

    $routes->group('agent', static function ($routes) {
        $routes->post('add', 'api\Agent::add');
        $routes->post('list', 'api\Agent::list');
        $routes->post('info', 'api\Agent::info');
        $routes->post('info/update', 'api\Agent::info_update');
    });
    
    $routes->group('user', static function ($routes) {
        $routes->post('add', 'api\User::add');
        $routes->post('list', 'api\User::list');
        $routes->post('info', 'api\User::info');
        $routes->post('info/update', 'api\User::info_update');
    });

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
