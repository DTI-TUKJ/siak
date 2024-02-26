<?php

use CodeIgniter\Router\RouteCollection;


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Index::index');
$routes->get('/Siak', 'Home::index');

$routes->post('/Siak/AdminSignin', 'Admin::index');
$routes->post('/Siak/Signin', 'Admin::pgwSignin');
$routes->get('/Siak/AdminSignin', 'Admin::index');
$routes->get('/Siak/Signin', 'Admin::pgwSignin');
$routes->get('/Siak/redirect', 'Admin::redirect');
$routes->get('/Logout', 'Admin::Logout');
$routes->get('/Siak/User', 'User::index');
$routes->get('/Siak/User', 'User::index');

$routes->post('UserDelete', 'User::deleteUser');

$routes->post('/changeUnit', 'Myasset::UpUnit');

$routes->get('/Siak/MyAsset', 'Myasset::index');
$routes->post('/callDataJson', 'Myasset::dataJson');
$routes->post('/addAsset', 'Myasset::insertAsset');
$routes->post('/AssetDelete', 'Myasset::deleteAsset');
$routes->post('/modalEditAsset', 'Myasset::modalEdit');
$routes->post('/assetEdit', 'Myasset::editAsset');
$routes->post('/showAsset', 'Myasset::show_asset');
$routes->post('/showAssetStatus', 'Myasset::show_asset_status');



$routes->get('/Siak/DataLoan', 'Loan::index');
$routes->get('/Siak/loanHistory', 'Loan::history');
$routes->post('/dataJsonLoan', 'Loan::dataJson');
$routes->post('/checkSchedule', 'Loan::ScheduleCheck');
$routes->post('/addLoan', 'Loan::addLoan');
$routes->post('/loanDelete', 'Loan::deleteLoan');
$routes->post('/statusLoanUp', 'Loan::updateStatusLoan');
$routes->post('/detailLoan', 'Myasset::loan_detail');
$routes->post('/getNip', 'Loan::getPgw');

$routes->post('/getNipId', 'Loan::getPgwId');

$routes->get('/Siak/MyLoan', 'MyLoan::index');
$routes->post('/dataJsonMyLoan', 'MyLoan::dataJson');


$routes->get('/Siak/DataEmployee', 'Employee::index');

$routes->post('callDataEmpJson', 'Employee::dataJson');




