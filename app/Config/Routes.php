<?php

use App\Controllers\User;
use App\Controllers\UserData;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes         
 * 
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->post('auth', 'Login::auth');
$routes->get('users', [User::class, 'index']);
$routes->post('users/create', [User::class, 'create']);
$routes->delete('users/delete', [User::class, 'delete']);
$routes->get('users/edit/(:segment)',[User::class,'edit']);
$routes->post('users/update',[User::class,'update']);
$routes->get('salary','User::salary');
$routes->post('paysalary','User::paysalary');
$routes ->get('logout','User::logout');

//orders routes
$routes->group('orders', function ($routes) {
    $routes->get('/', 'OrdersController::index');
    $routes->get('create', 'OrdersController::create');
    $routes->post('store', 'OrdersController::store');
    $routes->get('edit/(:segment)', 'OrdersController::edit/$1');
    $routes->post('update', 'OrdersController::update');
    $routes->post('delete', 'OrdersController::delete');
    $routes->get('todayorders', 'OrdersController::todayOrders');
    $routes->get('searchorders','OrdersController::oldOrders');
   
    $routes->get('previousorders/(:segment)/(:segment)', 'OrdersController::previous/$1/$2');


});

 //salio routes

 $routes->get('salio', 'SalioController::salio');
$routes->post('balance', 'SalioController::create');
$routes->get('todayreport','OrdersController::todayreport');

// maintanance routes
$routes->get('maintanance','MaintananceController::maintanance');
$routes ->post('store','MaintananceController::store' );
$routes ->get('MatengenezoReport','MaintananceController::MatengenezoReport');

//payroll routes
$routes->get('payroll','PayrollController::index');
$routes ->get('salaryReport','PayrollController::Report');

