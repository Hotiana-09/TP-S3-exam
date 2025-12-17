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


    public function updateCourse($id) {
        $CourseModele = new CourseModele(Flight::db());
        
        $data = [
            'id_conducteur' => Flight::request()->data->id_conducteur,
            'id_moto' => Flight::request()->data->id_moto,
            'date_course' => Flight::request()->data->date_course,
            'h_depart' => Flight::request()->data->h_depart,
            'h_arrivee' => Flight::request()->data->h_arrivee,
            'lieu_depart' => Flight::request()->data->lieu_depart,
            'lieu_destination' => Flight::request()->data->lieu_destination,
            'km_effectue' => Flight::request()->data->km_effectue,
            'montant' => Flight::request()->data->montant,
            'etat' => Flight::request()->data->etat
        ];
        
        $CourseModele->updateCourse($id, $data);
        Flight::redirect('/');
    }


}