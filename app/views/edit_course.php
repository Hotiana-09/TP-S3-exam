    <main>
        <div class="container py-4">
            <form method="POST" action="/course/update/<?= $course['id_course']; ?>">
                <!-- En-tête -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">
                        <i class="bi bi-pencil-square text-primary"></i>
                        Modifier la course #<?= $course['id_course']; ?>
                    </h2>
                    <div class="btn-group">
                        <a href="/" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Annuler
                        </a>
                        <?php if ($course['etat'] !== 'valide'): ?>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Enregistrer
                            </button>
                        <?php endif; ?>
                    </div>
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
                    $isValidated = $course['etat'] === 'valide';
                ?>

                <?php if ($isValidated): ?>
                    <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-lock-fill fs-4 me-3"></i>
                        <div>
                            <strong>Course validée !</strong> Cette course ne peut plus être modifiée.
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Carte Informations générales -->
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
                            <!-- Date -->
                            <div class="col-md-6">
                                <label for="date_course" class="form-label">
                                    <i class="bi bi-calendar3"></i> Date de la course
                                </label>
                                <input type="date" 
                                       class="form-control form-control-lg" 
                                       id="date_course" 
                                       name="date_course"
                                       value="<?= $course['date_course']; ?>"
                                       <?= $isValidated ? 'disabled' : 'required'; ?>>
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

                            <!-- Distance -->
                            <div class="col-md-6">
                                <label for="km_effectue" class="form-label">
                                    <i class="bi bi-speedometer2"></i> Distance effectuée (km)
                                </label>
                                <input type="number" 
                                       class="form-control form-control-lg" 
                                       id="km_effectue" 
                                       name="km_effectue"
                                       value="<?= $course['km_effectue']; ?>"
                                       step="0.01"
                                       min="0"
                                       <?= $isValidated ? 'disabled' : 'required'; ?>>
                            </div>

                            <!-- Montant -->
                            <div class="col-md-6">
                                <label for="montant" class="form-label">
                                    <i class="bi bi-currency-exchange"></i> Montant payé (Ar)
                                </label>
                                <input type="number" 
                                       class="form-control form-control-lg" 
                                       id="montant" 
                                       name="montant"
                                       value="<?= $course['montant']; ?>"
                                       step="1"
                                       min="0"
                                       <?= $isValidated ? 'disabled' : 'required'; ?>>
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
                                    Sélectionner un conducteur
                                </label>
                                <select class="form-select form-select-lg" 
                                        id="id_conducteur" 
                                        name="id_conducteur"
                                        <?= $isValidated ? 'disabled' : 'required'; ?>>
                                    <option value="">-- Choisir un conducteur --</option>
                                    <?php foreach($conducteurs as $conducteur): ?>
                                        <option value="<?= $conducteur['id']; ?>" 
                                                <?= $course['id_conducteur'] == $conducteur['id'] ? 'selected' : ''; ?>>
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
                                    Sélectionner une moto
                                </label>
                                <select class="form-select form-select-lg" 
                                        id="id_moto" 
                                        name="id_moto"
                                        <?= $isValidated ? 'disabled' : 'required'; ?>>
                                    <option value="">-- Choisir une moto --</option>
                                    <?php foreach($motos as $moto): ?>
                                        <option value="<?= $moto['id']; ?>" 
                                                <?= $course['id_moto'] == $moto['id'] ? 'selected' : ''; ?>>
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
                                        <label for="lieu_depart" class="form-label">Lieu de départ</label>
                                        <input type="text" 
                                               class="form-control form-control-lg" 
                                               id="lieu_depart" 
                                               name="lieu_depart"
                                               placeholder="Ex: Analakely"
                                               value="<?= htmlspecialchars($course['lieu_depart']); ?>"
                                               <?= $isValidated ? 'disabled' : 'required'; ?>>
                                    </div>
                                    <div class="mb-3">
                                        <label for="h_depart" class="form-label">
                                            <i class="bi bi-clock"></i> Heure de départ
                                        </label>
                                        <input type="time" 
                                               class="form-control form-control-lg" 
                                               id="h_depart" 
                                               name="h_depart"
                                               value="<?= date('H:i', strtotime($course['h_depart'])); ?>"
                                               <?= $isValidated ? 'disabled' : 'required'; ?>>
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
                                        <label for="lieu_destination" class="form-label">Lieu d'arrivée</label>
                                        <input type="text" 
                                               class="form-control form-control-lg" 
                                               id="lieu_destination" 
                                               name="lieu_destination"
                                               placeholder="Ex: Ivato"
                                               value="<?= htmlspecialchars($course['lieu_destination']); ?>"
                                               <?= $isValidated ? 'disabled' : 'required'; ?>>
                                    </div>
                                    <div class="mb-3">
                                        <label for="h_arrivee" class="form-label">
                                            <i class="bi bi-clock-fill"></i> Heure d'arrivée
                                        </label>
                                        <input type="time" 
                                               class="form-control form-control-lg" 
                                               id="h_arrivee" 
                                               name="h_arrivee"
                                               value="<?= date('H:i', strtotime($course['h_arrivee'])); ?>"
                                               <?= $isValidated ? 'disabled' : 'required'; ?>>
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
                                    <i class="bi bi-tools"></i> Actions disponibles
                                </h5>
                                <small class="text-muted">
                                    <?php if (!$isValidated): ?>
                                        Enregistrez vos modifications ou validez définitivement la course
                                    <?php else: ?>
                                        Cette course est validée et ne peut plus être modifiée
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="btn-group" role="group">
                                <?php if (!$isValidated): ?>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="bi bi-save"></i> Enregistrer
                                    </button>
                                    
                                    <a href="/course/valide/<?= $course['id_course']; ?>" 
                                       class="btn btn-success btn-lg"
                                       onclick="return confirm('⚠️ Attention !\n\nValider cette course la rendra définitive et non modifiable.\n\nÊtes-vous sûr de vouloir continuer ?')">
                                        <i class="bi bi-check-circle"></i> Valider définitivement
                                    </a>
                                <?php else: ?>
                                    <button class="btn btn-success btn-lg" disabled>
                                        <i class="bi bi-check-circle-fill"></i> Course validée
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>