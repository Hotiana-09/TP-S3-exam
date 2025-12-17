<?php

namespace app\controllers;

use app\models\CourseModele;
use app\models\ConducteurModele;
use app\models\MotoModele;
use Flight;
use flight\Engine;


class CourseController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}


	public function getAllCourse() {
		$CourseModele = new CourseModele(Flight::db());
		$all_course = $CourseModele->getAllCourse();
		Flight::render('liste', ['list_course' => $all_course]);
	}

	public function valide_course($id) {
		$CourseModele = new CourseModele(Flight::db());
		$CourseModele->valideCourse($id);
		Flight::redirect('/');
	}

	public function getSingleCourseLib($id){
		$CourseModele = new CourseModele(Flight::db());
		$select_course = $CourseModele->getSingleCourseLib($id);
		Flight::render('fiche', ['course' => $select_course]);
	}


	public function editCourse($id){
        $CourseModele = new CourseModele(Flight::db());
        $ConducteurModele = new ConducteurModele(Flight::db());
        $MotoModele = new MotoModele(Flight::db());
        
        $course = $CourseModele->getSingleCourseLib($id);
        
        $conducteurs = $ConducteurModele->getAllConducteur();
        $motos = $MotoModele->getAllMoto();
        
        Flight::render('edit_course', [
            'course' => $course,
            'conducteurs' => $conducteurs,
            'motos' => $motos
        ]);
    }



}