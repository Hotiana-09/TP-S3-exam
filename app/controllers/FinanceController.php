<?php
namespace app\controllers;

use Flight;
use app\models\FinanceModele;

class FinanceController {

    public static function index() {
        $resume = FinanceModele::getResumeJournalier();
        $totaux = FinanceModele::getTotaux();

        Flight::render('resume', [
            'resume' => $resume,
            'totaux' => $totaux
        ]);
    }
}
