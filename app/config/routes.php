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

<<<<<<< HEAD
	$router->get('/', [ $CourseController, 'getAllCourse']);
	$router->get('/course/valide/@id', [ $CourseController, 'valide_course']);
	$router->get('/course/view/@id', [ $CourseController, 'getSingleCourseLib']);
	$router->get('/course/edit/@id', [ $CourseController, 'editCourse']);	
	$router->post('/course/update/@id', [ $CourseController, 'updateCourse']);	

	$router->get('/finance', [ $FinanceController, 'index']);
=======
	$router->get('/', [ $CourseController, 'home']);
	$router->get('/liste', [ $CourseController, 'getAllCourse']);
>>>>>>> 03c0e1ec5be0bba3f5176f62462f2190075cbd4b
	
	$router->group('/course', function(Router $router) use ($CourseController) {
			$router->get('/valide/@id', [ $CourseController, 'valide_course']);
			$router->get('/view/@id', [ $CourseController, 'getSingleCourseLib']);
			$router->get('/edit/@id', [ $CourseController, 'editCourse']);  
			$router->post('/update/@id', [ $CourseController, 'updateCourse']); 
	});

	$router->get('/create', [ $CourseController, 'createCourse']);
	$router->post('/insert', [ $CourseController, 'insertCourse']);


}, [ SecurityHeadersMiddleware::class ]);

