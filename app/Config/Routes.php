<?php

use App\Controllers\User;
use App\Controllers\UserData;
use App\Controllers\BranchController;
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
$routes->get('profile/picture', 'User::profilePictureView');
$routes->get('profile/password', 'User::changePasswordView');
$routes->get('profile/settings', 'User::profileSettings');
$routes->post('profile/password', 'User::updatePassword');
$routes->post('profile/picture', 'User::updateProfilePicture');
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
    $routes->get('todayorders/download', 'OrdersController::downloadTodayOrders');
    $routes->get('searchorders','OrdersController::oldOrders');
    $routes->get('searchorders/download', 'OrdersController::downloadOldOrdersFiltered');
   
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

// branch routes (admin only)
$routes->get('branches', [BranchController::class, 'index']);
$routes->post('branches/store', [BranchController::class, 'store']);
$routes->get('branches/edit/(:segment)', 'BranchController::edit/$1');
$routes->post('branches/update', [BranchController::class, 'update']);
$routes->post('branches/delete', [BranchController::class, 'delete']);

