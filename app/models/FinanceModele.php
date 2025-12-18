<?php
namespace app\models;

use Flight;
use PDO;

class FinanceModele {

    public static function getResumeJournalier() {
        $sql = "SELECT * FROM taxi_v_resume_journalier ORDER BY date";
        return Flight::db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTotaux() {
        $sql = "SELECT * FROM taxi_v_resume_total";
        return Flight::db()->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
}
