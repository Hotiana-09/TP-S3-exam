<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Course #<?= $course['id_course']; ?> - E-commerce</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="/assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap-icons/bootstrap-icons.min.css">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                
            </nav>
        </div>
    </header>

    <main>
        <div class="container py-4">
            <!-- En-tête avec bouton retour -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">
                    <i class="bi bi-file-text text-primary"></i>
                    Détails de la course #<?= $course['id_course']; ?>
                </h2>
                <a href="/" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Retour à la liste
                </a>
            </div>

            <?php
                $badge_class = match($course['etat']) {
                    'insere' => 'bg-secondary',
                    'termine' => 'bg-warning text-dark',
                    'valide' => 'bg-success',
                    default => 'bg-secondary'
                };
                $etat_label = match($course['etat']) {
                    'insere' => 'Insérée',
                    'termine' => 'Terminée',
                    'valide' => 'Validée',
                    default => $course['etat']
                };
            ?>

            <!-- Carte principale -->
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle"></i> Informations générales
                    </h5>
                    <span class="badge <?= $badge_class ?> fs-6">
                        <?= $etat_label ?>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <!-- Date de la course -->
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <h6 class="text-muted mb-2">
                                    <i class="bi bi-calendar3"></i> Date de la course
                                </h6>
                                <p class="fs-5 mb-0 fw-bold">
                                    <?= date('d/m/Y', strtotime($course['date_course'])); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Montant -->
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <h6 class="text-muted mb-2">
                                    <i class="bi bi-currency-exchange"></i> Montant payé
                                </h6>
                                <p class="fs-5 mb-0 fw-bold text-success">
                                    <?= number_format($course['montant'], 0, ',', ' '); ?> Ar
                                </p>
                            </div>
                        </div>

                        <!-- Distance -->
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <h6 class="text-muted mb-2">
                                    <i class="bi bi-speedometer2"></i> Distance effectuée
                                </h6>
                                <p class="fs-5 mb-0 fw-bold">
                                    <span class="badge bg-info fs-6">
                                        <?= number_format($course['km_effectue'], 2); ?> km
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- État -->
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <h6 class="text-muted mb-2">
                                    <i class="bi bi-flag"></i> État de la course
                                </h6>
                                <p class="fs-5 mb-0">
                                    <span class="badge <?= $badge_class ?> fs-6">
                                        <?= $etat_label ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Carte Conducteur -->
                <div class="col-md-6">
                    <div class="card shadow h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="bi bi-person-circle"></i> Conducteur
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="text-muted small">Nom complet</label>
                                <p class="fs-5 mb-0 fw-bold">
                                    <?= htmlspecialchars($course['nom_conducteur'] . ' ' . $course['prenom_conducteur']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Véhicule -->
                <div class="col-md-6">
                    <div class="card shadow h-100">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">
                                <i class="bi bi-bicycle"></i> Véhicule
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="text-muted small">Marque de la moto</label>
                                <p class="fs-5 mb-0 fw-bold">
                                    <?= htmlspecialchars($course['marque']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte Trajet -->
            <div class="card shadow mt-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-map"></i> Détails du trajet
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <!-- Départ -->
                        <div class="col-md-6">
                            <div class="border-start border-success border-4 ps-3">
                                <h6 class="text-muted mb-2">
                                    <i class="bi bi-geo-alt-fill text-success"></i> Point de départ
                                </h6>
                                <p class="fs-5 mb-2 fw-bold">
                                    <?= htmlspecialchars($course['lieu_depart']); ?>
                                </p>
                                <p class="mb-0 text-muted">
                                    <i class="bi bi-clock"></i> 
                                    Heure de départ : <strong><?= date('H:i', strtotime($course['h_depart'])); ?></strong>
                                </p>
                            </div>
                        </div>

                        <!-- Arrivée -->
                        <div class="col-md-6">
                            <div class="border-start border-danger border-4 ps-3">
                                <h6 class="text-muted mb-2">
                                    <i class="bi bi-geo-alt-fill text-danger"></i> Point d'arrivée
                                </h6>
                                <p class="fs-5 mb-2 fw-bold">
                                    <?= htmlspecialchars($course['lieu_destination']); ?>
                                </p>
                                <p class="mb-0 text-muted">
                                    <i class="bi bi-clock-fill"></i> 
                                    Heure d'arrivée : <strong><?= date('H:i', strtotime($course['h_arrivee'])); ?></strong>
                                </p>
                            </div>
                        </div>

                        <!-- Durée du trajet -->
                        <div class="col-12">
                            <div class="alert alert-info d-flex align-items-center" role="alert">
                                <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                                <div>
                                    <?php
                                        $depart = new DateTime($course['h_depart']);
                                        $arrivee = new DateTime($course['h_arrivee']);
                                        $duree = $depart->diff($arrivee);
                                    ?>
                                    <strong>Durée du trajet :</strong> 
                                    <?= $duree->h ?> heure(s) et <?= $duree->i ?> minute(s)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="card shadow mt-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-tools"></i> Actions disponibles
                        </h5>
                        <div class="btn-group" role="group">
                            <?php if ($course['etat'] !== 'valide'): ?>
                                <a href="/course/edit/<?= $course['id_course']; ?>" 
                                   class="btn btn-primary">
                                    <i class="bi bi-pencil"></i> Modifier
                                </a>
                                
                                <form method="GET" 
                                      action="/course/valide/<?= $course['id_course']; ?>" 
                                      class="d-inline" 
                                      onsubmit="return confirm('Valider cette course ? Elle ne pourra plus être modifiée.')">
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-check-circle"></i> Valider
                                    </button>
                                </form>
                            <?php else: ?>
                                <button class="btn btn-success" disabled>
                                    <i class="bi bi-check-circle-fill"></i> Course validée
                                </button>
                            <?php endif; ?>
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