<?php
namespace app\models;

use PDO;
use app\config\Database;

    class ConducteurModele {

        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        
        public function create_v_conducteur_all_lib(){
            $sql = "CREATE OR REPLACE VIEW taxi_v_conducteur_all_lib AS ".
                   "SELECT  ".
                   "cond.id_conducteur, cond.nom, cond.prenom, slcond.pourcentage ".
                   "FROM taxi_conducteur cond ".
                   "LEFT JOIN taxi_salaire_conducteur slcond ".
                   "ON cond.id_conducteur = slcond.id_conducteur;";

            $stmt = $this->db->query($sql);
        }
        
        public function getAllConducteur() {
            $conducteur = array();
            $this->create_v_conducteur_all_lib();
            $sql = "SELECT * ".
                    "FROM taxi_v_conducteur_all_lib ".
                    "order by id_conducteur;";

            $stmt = $this->db->query($sql);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $conducteur[] = array(
                    'id' => $row['id_conducteur'],
                    'nom' => $row['nom'],
                    'prenom' => $row['prenom'],
                    'pourcentage' => $row['pourcentage']
                );
            }

            return $conducteur;
        }



    }

?> 