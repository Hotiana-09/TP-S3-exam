<?php

use app\controllers\CourseController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;
use app\controllers\FinanceController;


/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->group('', function(Router $router) use ($app) {

	$CourseController = new CourseController($app);
	$FinanceController = new FinanceController();

	$router->get('/', [ $CourseController, 'home']);
	$router->get('/liste', [ $CourseController, 'getAllCourse']);
	
	$router->group('/course', function(Router $router) use ($CourseController) {
			$router->get('/valide/@id', [ $CourseController, 'valide_course']);
			$router->get('/view/@id', [ $CourseController, 'getSingleCourseLib']);
			$router->get('/edit/@id', [ $CourseController, 'editCourse']);  
			$router->post('/update/@id', [ $CourseController, 'updateCourse']); 
	});

	$router->get('/create', [ $CourseController, 'createCourse']);
	$router->post('/insert', [ $CourseController, 'insertCourse']);
	$router->get('/finance', [ $FinanceController, 'index']);

	$router->get('/editEssence', [ $CourseController, 'editEssence']);
	$router->post('/insertEssence', [ $CourseController, 'insertEssence']);

}, [ SecurityHeadersMiddleware::class ]);

