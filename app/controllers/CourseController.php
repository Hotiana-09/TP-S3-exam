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
    
    public function home(){
        Flight::render('home');
    }

    public function editEssence(){
        $this->app->render('layout', [
            'page' => 'editEssence.php',
        ]);    
    }
    
    public function vider_list(){
        $this->app->render('layout', [
            'page' => 'vide_list.php',
        ]);    
    }

    public function getAllCourse() {
        $CourseModele = new CourseModele(Flight::db());
        $all_course = $CourseModele->getAllCourse();
        $this->app->render('layout', [
            'page' => 'liste.php',
            'list_course' => $all_course
        ]);
    }
    
    public function valide_course($id) {
        $CourseModele = new CourseModele(Flight::db());
        $CourseModele->valideCourse($id);
        Flight::redirect('/liste');
    }
    
    public function getSingleCourseLib($id){
        $CourseModele = new CourseModele(Flight::db());
        $select_course = $CourseModele->getSingleCourseLib($id);
        $this->app->render('layout', [
            'page' => 'fiche.php',
            'course' => $select_course
        ]);
    }
    
    public function editCourse($id){
        $CourseModele = new CourseModele(Flight::db());
        $ConducteurModele = new ConducteurModele(Flight::db());
        $MotoModele = new MotoModele(Flight::db());
        
        $course = $CourseModele->getSingleCourseLib($id);
        $conducteurs = $ConducteurModele->getAllConducteur();
        $motos = $MotoModele->getAllMoto();
        
        $this->app->render('layout', [
            'page' => 'edit_course.php',
            'course' => $course,
            'conducteurs' => $conducteurs,
            'motos' => $motos
        ]);
    }
    
    public function updateCourse($id) {
        $CourseModele = new CourseModele(Flight::db());
        
        $data = [
            'id_conducteur' => $_POST['id_conducteur'],
            'id_moto' => $_POST['id_moto'],
            'date_course' => $_POST['date_course'],
            'h_depart' => $_POST['h_depart'],
            'h_arrivee' => $_POST['h_arrivee'],
            'lieu_depart' => $_POST['lieu_depart'],
            'lieu_destination' => $_POST['lieu_destination'],
            'km_effectue' => $_POST['km_effectue'],
            'montant' => $_POST['montant'],
            'etat' => $_POST['etat']
        ];
        
        $CourseModele->updateCourse($id, $data);
        Flight::redirect('/liste');
    }
    
    public function createCourse(){
        $ConducteurModele = new ConducteurModele(Flight::db());
        $MotoModele = new MotoModele(Flight::db());
        
        $conducteurs = $ConducteurModele->getAllConducteur();
        $motos = $MotoModele->getAllMoto();
        
        $this->app->render('layout', [
            'page' => 'formulaire.php',
            'conducteurs' => $conducteurs,
            'motos' => $motos
        ]);
    }
    
    public function insertCourse(){
        $CourseModele = new CourseModele(Flight::db());
        
        $data = [
            'id_conducteur' => $_POST['id_conducteur'],
            'id_moto' => $_POST['id_moto'],
            'date_course' => $_POST['date_course'],
            'h_depart' => $_POST['h_depart'],
            'h_arrivee' => $_POST['h_arrivee'],
            'lieu_depart' => $_POST['lieu_depart'],
            'lieu_destination' => $_POST['lieu_destination'],
            'km_effectue' => $_POST['km_effectue'],
            'montant' => $_POST['montant']
        ];
        
        $CourseModele->insertCourse($data);
        Flight::redirect('/liste');
    }


    public function insertEssence(){
        $CourseModele = new CourseModele(Flight::db());
        $prixEssence = $_POST['prix'];
        $CourseModele->insertEssence($prixEssence);
        Flight::redirect('/');
    }
}
?>
