<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('personne','Personne::index');
$routes->post('personne/ajouter','Personne::ajouter');
$routes->get('personne/modifier/(:num)','Personne::modifier/$1');
$routes->post('personne/postModifier/(:num)','Personne::postModifier/$1');
$routes->get('personne/supprimer/(:num)','Personne::supprimer/$1');

$routes->get('/user/create', 'User::create');
$routes->post('/user/store', 'User::store');
$routes->get('/user/profile/(:num)', 'User::profile/$1');
$routes->get('/user/edit/(:num)', 'User::edit/$1');
$routes->post('/user/update/(:num)', 'User::update/$1');
$routes->get('/users', 'User::index');
$routes->get('/user/delete/(:num)', 'User::delete/$1');
$routes->post('user/update_cover/(:num)', 'User::update_cover/$1');


$routes->get('/articles/delete/(:num)', 'ArticleController::delete/$1');
$routes->get('/articles/acheter/(:num)', 'ArticleController::acheter/$1');
$routes->post('/articles/echanger/(:num)', 'ArticleController::echanger/$1');


$routes->get('/articles', 'ArticleController::index');
$routes->post('/articles/add', 'ArticleController::add');

// Pour acheter → GET
$routes->get('/articles/acheter/(:num)', 'ArticleController::acheter/$1');

// Pour échanger → POST
$routes->post('/articles/echanger/(:num)', 'ArticleController::echanger/$1');


// Chat routes
$routes->get('/chat/(:num)/(:num)', 'Chat::index/$1/$2');
$routes->post('/chat/send', 'Chat::send');
$routes->get('/chat', 'Chat::index');
$routes->get('/dbtest', 'DbTest::index');
$routes->get('/chat/delete/(:num)', 'Chat::delete/$1');
