<?php

use app\controllers\CourseController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->group('', function(Router $router) use ($app) {

	$CourseController = new CourseController($app);

	$router->get('/', [ $CourseController, 'getAllCourse']);
	$router->get('/course/valide/@id', [ $CourseController, 'valide_course']);
	$router->get('/course/view/@id', [ $CourseController, 'getSingleCourseLib']);
	$router->get('/course/edit/@id', [ $CourseController, 'editCourse']);	
	
}, [ SecurityHeadersMiddleware::class ]);