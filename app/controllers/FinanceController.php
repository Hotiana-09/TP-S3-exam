<?php
namespace app\controllers;

use Flight;
use app\models\FinanceModele;

class FinanceController {

    public static function index() {
        $resume = FinanceModele::getResumeJournalier();
        $totaux = FinanceModele::getTotaux();

        Flight::render('layout', [
            'page' => 'resume.php',
            'resume' => $resume,
            'totaux' => $totaux
        ]);
    }
}
