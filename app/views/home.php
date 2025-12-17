<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion Taxi</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="/assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap-icons/bootstrap-icons.min.css">
</head>
<body>
    <div class="hero-section">
        <div class="container">
            <div class="text-center">
                <h1 class="display-3 fw-bold mb-3">
                    <i class="bi bi-taxi-front"></i> Gestion Taxi Moto
                </h1>
                <p class="lead mb-0">
                    Système de gestion des courses et bénéfices
                </p>
            </div>
        </div>
    </div>

    <main>
        <div class="container pb-5">
            <div class="row g-4 mb-5">

                <div class="col-md-4">
                    <a href="/liste" class="text-decoration-none">
                        <div class="action-card card primary shadow-lg">
                            <div class="card-body">
                                <i class="bi bi-list-ul action-icon"></i>
                                <h3 class="card-title fw-bold mb-3">Liste des Courses</h3>
                                <p class="card-text mb-4">
                                    Consultez toutes les courses enregistrées, modifiez ou validez-les
                                </p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="badge bg-white text-primary fs-6 px-4 py-2">
                                        Voir la liste <i class="bi bi-arrow-right ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="/create" class="text-decoration-none">
                        <div class="action-card card success shadow-lg">
                            <div class="card-body">
                                <i class="bi bi-plus-circle action-icon"></i>
                                <h3 class="card-title fw-bold mb-3">Nouvelle Course</h3>
                                <p class="card-text mb-4">
                                    Enregistrez une nouvelle course avec toutes les informations nécessaires
                                </p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="badge bg-white text-success fs-6 px-4 py-2">
                                        Créer <i class="bi bi-arrow-right ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="/benefices" class="text-decoration-none">
                        <div class="action-card card info shadow-lg">
                            <div class="card-body">
                                <i class="bi bi-graph-up-arrow action-icon"></i>
                                <h3 class="card-title fw-bold mb-3">Bénéfices</h3>
                                <p class="card-text mb-4">
                                    Consultez les statistiques et bénéfices réalisés par période
                                </p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="badge bg-white text-info fs-6 px-4 py-2">
                                        Analyser <i class="bi bi-arrow-right ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">
                        <i class="bi bi-lightbulb text-warning"></i> Guide rapide
                    </h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-start">
                                <span class="badge bg-primary rounded-circle me-3" style="width: 30px; height: 30px; padding-top: 7px;">1</span>
                                <div>
                                    <strong>Créer une course</strong>
                                    <p class="text-muted small mb-0">Enregistrez les détails de chaque trajet effectué</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-start">
                                <span class="badge bg-primary rounded-circle me-3" style="width: 30px; height: 30px; padding-top: 7px;">2</span>
                                <div>
                                    <strong>Gérer les courses</strong>
                                    <p class="text-muted small mb-0">Modifiez ou validez les courses dans la liste</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-start">
                                <span class="badge bg-primary rounded-circle me-3" style="width: 30px; height: 30px; padding-top: 7px;">3</span>
                                <div>
                                    <strong>Analyser les bénéfices</strong>
                                    <p class="text-muted small mb-0">Consultez vos statistiques et revenus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; ETU004106 - ETU004132</p>
    </footer>

</body>
</html>