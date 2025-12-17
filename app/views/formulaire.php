<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Courses - Taxi</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="/assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap-icons/bootstrap-icons.min.css">

</head>
<body>
    <div class="hero-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="display-5 fw-bold mb-2">
                        <i class="bi bi-list-ul"></i> Liste des Courses
                    </h1>
                    <p class="mb-0">Gérez toutes vos courses</p>
                </div>
                <div class="btn-group">
                    <a href="/" class="btn btn-light btn-lg">
                        <i class="bi bi-house"></i> Accueil
                    </a>
                    <a href="/course/create" class="btn btn-success btn-lg">
                        <i class="bi bi-plus-circle"></i> Nouvelle Course
                    </a>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="container py-4">
            <form method="POST" action="/insert">
                <!-- En-tête -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">
                        <i class="bi bi-plus-circle text-success"></i>
                        Nouvelle course
                    </h2>
                    <div class="btn-group">
                        <a href="/" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Annuler
                        </a>
                    </div>
                </div>

                <!-- Alert info -->
                <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
                    <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                    <div>
                        <strong>Nouvelle course :</strong> Remplissez tous les champs pour enregistrer une nouvelle course.
                    </div>
                </div>

                <!-- Carte Informations générales -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-info-circle"></i> Informations générales
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <!-- Date -->
                            <div class="col-md-6">
                                <label for="date_course" class="form-label">
                                    <i class="bi bi-calendar3"></i> Date de la course
                                </label>
                                <input type="date" 
                                       class="form-control form-control-lg" 
                                       id="date_course" 
                                       name="date_course"
                                       value="<?= date('Y-m-d'); ?>"
                                       required>
                            </div>

                            <!-- Distance -->
                            <div class="col-md-6">
                                <label for="km_effectue" class="form-label">
                                    <i class="bi bi-speedometer2"></i> Distance effectuée (km)
                                </label>
                                <input type="number" 
                                       class="form-control form-control-lg" 
                                       id="km_effectue" 
                                       name="km_effectue"
                                       placeholder="Ex: 15.50"
                                       step="0.01"
                                       min="0"
                                       required>
                            </div>

                            <!-- Montant -->
                            <div class="col-md-12">
                                <label for="montant" class="form-label">
                                    <i class="bi bi-currency-exchange"></i> Montant payé (Ar)
                                </label>
                                <input type="number" 
                                       class="form-control form-control-lg" 
                                       id="montant" 
                                       name="montant"
                                       placeholder="Ex: 15000"
                                       step="1"
                                       min="0"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Carte Conducteur avec SELECT -->
                    <div class="col-md-6">
                        <div class="card shadow h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="bi bi-person-circle"></i> Conducteur
                                </h5>
                            </div>
                            <div class="card-body">
                                <label for="id_conducteur" class="form-label fw-bold">
                                    Sélectionner un conducteur <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg" 
                                        id="id_conducteur" 
                                        name="id_conducteur"
                                        required>
                                    <option value="">-- Choisir un conducteur --</option>
                                    <?php foreach($conducteurs as $conducteur): ?>
                                        <option value="<?= $conducteur['id']; ?>">
                                            <?= htmlspecialchars($conducteur['nom'] . ' ' . $conducteur['prenom']); ?>
                                            <?php if ($conducteur['pourcentage']): ?>
                                                - (<?= $conducteur['pourcentage']; ?>%)
                                            <?php endif; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-muted mt-2 d-block">
                                    <i class="bi bi-info-circle"></i> Le pourcentage indique la commission du conducteur
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Carte Véhicule avec SELECT -->
                    <div class="col-md-6">
                        <div class="card shadow h-100">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">
                                    <i class="bi bi-bicycle"></i> Véhicule
                                </h5>
                            </div>
                            <div class="card-body">
                                <label for="id_moto" class="form-label fw-bold">
                                    Sélectionner une moto <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg" 
                                        id="id_moto" 
                                        name="id_moto"
                                        required>
                                    <option value="">-- Choisir une moto --</option>
                                    <?php foreach($motos as $moto): ?>
                                        <option value="<?= $moto['id']; ?>">
                                            <?= htmlspecialchars($moto['marque_moto']); ?> 
                                            - <?= htmlspecialchars($moto['immatriculation']); ?>
                                            <?php if (isset($moto['consommation'])): ?>
                                                (<?= $moto['consommation']; ?>L/100km)
                                            <?php endif; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-muted mt-2 d-block">
                                    <i class="bi bi-info-circle"></i> Choisissez le véhicule utilisé pour cette course
                                </small>
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
                                    <h6 class="text-success mb-3">
                                        <i class="bi bi-geo-alt-fill"></i> Point de départ
                                    </h6>
                                    <div class="mb-3">
                                        <label for="lieu_depart" class="form-label">
                                            Lieu de départ <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" 
                                               class="form-control form-control-lg" 
                                               id="lieu_depart" 
                                               name="lieu_depart"
                                               placeholder="Ex: Analakely"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="h_depart" class="form-label">
                                            <i class="bi bi-clock"></i> Heure de départ <span class="text-danger">*</span>
                                        </label>
                                        <input type="time" 
                                               class="form-control form-control-lg" 
                                               id="h_depart" 
                                               name="h_depart"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <!-- Arrivée -->
                            <div class="col-md-6">
                                <div class="border-start border-danger border-4 ps-3">
                                    <h6 class="text-danger mb-3">
                                        <i class="bi bi-geo-alt-fill"></i> Point d'arrivée
                                    </h6>
                                    <div class="mb-3">
                                        <label for="lieu_destination" class="form-label">
                                            Lieu d'arrivée <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" 
                                               class="form-control form-control-lg" 
                                               id="lieu_destination" 
                                               name="lieu_destination"
                                               placeholder="Ex: Ivato"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="h_arrivee" class="form-label">
                                            <i class="bi bi-clock-fill"></i> Heure d'arrivée <span class="text-danger">*</span>
                                        </label>
                                        <input type="time" 
                                               class="form-control form-control-lg" 
                                               id="h_arrivee" 
                                               name="h_arrivee"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions finales -->
                <div class="card shadow mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">
                                    <i class="bi bi-check-circle"></i> Prêt à enregistrer ?
                                </h5>
                                <small class="text-muted">
                                    Vérifiez que toutes les informations sont correctes avant de soumettre
                                </small>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="/" class="btn btn-secondary btn-lg">
                                    <i class="bi bi-x-circle"></i> Annuler
                                </a>
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-save"></i> Enregistrer la course
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>

    <footer>
        <p>&copy; ETU004106 - ETU004132</p>
    </footer>

</body>
</html>