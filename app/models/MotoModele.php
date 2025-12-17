<?php
namespace app\models;

use PDO;
use app\config\Database;

    class MotoModele {

        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        
        public function create_v_moto_all_lib(){
            $sql = "CREATE OR REPLACE VIEW v_moto_all_lib AS ".
                   "SELECT ".
                   "m.id_moto, m.marque, m.immatriculation, ".
                   "car.type, car.prix ".
                   "FROM taxi_moto m ".
                   "LEFT JOIN taxi_carburant car ".
                   "ON m.id_carburant = car.id_carburant";

            $stmt = $this->db->query($sql);
        }
        
        public function getAllMoto() {
            $course = array();
            $this->create_v_moto_all_lib();
            $sql = "SELECT * ".
                    "FROM taxi_moto ".
                    "order by id_moto;";

            $stmt = $this->db->query($sql);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $course[] = array(
                    'id' => $row['id_moto'],
                    'marque_moto' => $row['marque'],
                    'immatriculation' => $row['immatriculation'],
                    'consommation' => $row['consommation_par_100km'],
                    'type_carburant' => $row['type']
                );
            }

            return $course;
        }



    }

?> 