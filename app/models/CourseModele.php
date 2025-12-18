<?php
namespace app\models;

use PDO;
use app\config\Database;

    class CourseModele {

        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function create_v_course_all_lib(){
            $sql = "CREATE OR REPLACE VIEW taxi_v_course_lib AS ".
                   "SELECT ".
                   "cod.id_conducteur, cod.nom nom_conducteur,cod.prenom prenom_conducteur, m.marque, m.immatriculation,m.id_moto, ".
                   "cs.date_course, cs.h_depart, cs.h_arrivee, cs.lieu_depart, cs.lieu_destination, cs.km_effectue, cs.montant, cs.etat, cs.id_course ".
                   "FROM taxi_course cs ".
                   "LEFT JOIN taxi_conducteur cod ".
                   "ON cs.id_conducteur = cod.id_conducteur ".
                   "LEFT JOIN taxi_moto m ".
                   "ON cs.id_moto = m.id_moto;";
            $stmt = $this->db->query($sql);
            
        }

        public function getAllCourse() {
            $course = array();
            $this->create_v_course_all_lib();
            $sql = "SELECT * ".
                    "FROM taxi_v_course_lib ".
                    "order by date_course;";

            $stmt = $this->db->query($sql);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $course[] = array(
                    'id' => $row['id_course'],
                    'nom_conducteur' => $row['nom_conducteur'],
                    'marque_moto' => $row['marque'],
                    'date_course' => $row['date_course'],
                    'h_depart' => $row['h_depart'],
                    'h_arrivee' => $row['h_arrivee'],
                    'lieu_depart' => $row['lieu_depart'],
                    'lieu_destination' => $row['lieu_destination'],
                    'km_effectue' => $row['km_effectue'],
                    'montant_paye' => $row['montant'],
                    'etat' => $row['etat'],
                    'prenom_conducteur' => $row['prenom_conducteur']
                );
            }

            return $course;
        }


        public function valideCourse($id){
            $sql = "UPDATE taxi_course ".
                   "SET etat = 'valide' ".
                   "WHERE id_course = ? ;";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]); 
        }


        public function getSingleCourseLib($id){
            $sql = "SELECT * ".
                    "FROM taxi_v_course_lib ".
                    "WHERE id_course = ? ;";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]); 
            return $stmt->fetch();
        }


        public function updateCourse($id, $data) {
            $sql = "UPDATE taxi_course SET 
                    id_conducteur = ?,
                    id_moto = ?,
                    date_course = ?,
                    h_depart = ?,
                    h_arrivee = ?,
                    lieu_depart = ?,
                    lieu_destination = ?,
                    km_effectue = ?,
                    montant = ?,
                    etat = ?
                    WHERE id_course = ?";
            
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $data['id_conducteur'],
                $data['id_moto'],
                $data['date_course'],
                $data['h_depart'],
                $data['h_arrivee'],
                $data['lieu_depart'],
                $data['lieu_destination'],
                $data['km_effectue'],
                $data['montant'],
                $data['etat'],
                $id
            ]);
        }


        public function insertCourse($data) {
            $sql = "INSERT INTO taxi_course (
                        id_conducteur,
                        id_moto,
                        date_course,
                        h_depart,
                        h_arrivee,
                        lieu_depart,
                        lieu_destination,
                        km_effectue,
                        montant,
                        etat
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'insere')";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['id_conducteur'],
                $data['id_moto'],
                $data['date_course'],
                $data['h_depart'],
                $data['h_arrivee'],
                $data['lieu_depart'],
                $data['lieu_destination'],
                $data['km_effectue'],
                $data['montant']
            ]);
        }

    }

?> 