
    <main>
        <div class="container pb-5">
            <div class="card shadow-lg">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Conducteur</th>
                                    <th>Moto</th>
                                    <th>Trajet</th>
                                    <th>Horaires</th>
                                    <th class="text-end">Distance</th>
                                    <th class="text-end">Montant</th>
                                    <th class="text-end">Carburant</th>
                                    <th>État</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($list_course)): ?>
                                    <tr>
                                        <td colspan="10" class="text-center py-5 text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                            <p class="mb-0">Aucune course enregistrée</p>
                                            <a href="/course/create" class="btn btn-success mt-3">
                                                <i class="bi bi-plus-circle"></i> Créer la première course
                                            </a>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($list_course as $course): ?>
                                        <tr>
                                            <td class="fw-bold">#<?= $course['id']; ?></td>
                                            
                                            <td>
                                                <i class="bi bi-calendar3 text-muted"></i>
                                                <?= date('d/m/Y', strtotime($course['date_course'])); ?>
                                            </td>
                                            
                                            <td>
                                                <i class="bi bi-person-circle text-primary"></i>
                                                <?= htmlspecialchars($course['nom_conducteur'] . ' ' . $course['prenom_conducteur']); ?>
                                            </td>
                                            
                                            <td>
                                                <i class="bi bi-bicycle text-info"></i>
                                                <?= htmlspecialchars($course['marque_moto']); ?>
                                            </td>
                                            
                                            <td>
                                                <small class="d-block">
                                                    <i class="bi bi-geo-alt-fill text-success"></i> 
                                                    <?= htmlspecialchars($course['lieu_depart']); ?>
                                                </small>
                                                <small class="d-block text-muted">
                                                    <i class="bi bi-arrow-down"></i>
                                                </small>
                                                <small class="d-block">
                                                    <i class="bi bi-geo-alt-fill text-danger"></i> 
                                                    <?= htmlspecialchars($course['lieu_destination']); ?>
                                                </small>
                                            </td>
                                            
                                            <td>
                                                <small class="d-block">
                                                    <i class="bi bi-clock"></i> 
                                                    <?= date('H:i', strtotime($course['h_depart'])); ?>
                                                </small>
                                                <small class="d-block">
                                                    <i class="bi bi-clock-fill"></i> 
                                                    <?= date('H:i', strtotime($course['h_arrivee'])); ?>
                                                </small>
                                            </td>
                                            
                                            <td class="text-end">
                                                <span class="badge bg-info">
                                                    <?= number_format($course['km_effectue'], 2); ?> km
                                                </span>
                                            </td>
                                            
                                            <td class="text-end fw-bold">
                                                <?= number_format($course['montant_paye'], 0, ',', ' '); ?> Ar
                                            </td>                                            
                                            <td class="text-end fw-bold">
                                                <?= number_format($course['montant_essence'], 0, ',', ' '); ?> Ar
                                            </td>
                                            
                                            <td>
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
                                                <span class="badge <?= $badge_class ?>">
                                                    <?= $etat_label ?>
                                                </span>
                                            </td>
                                            
                                            <!-- Actions -->
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="/course/view/<?= $course['id']; ?>" 
                                                       class="btn btn-outline-info" 
                                                       title="Voir">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    
                                                    <?php if ($course['etat'] !== 'valide'): ?>
                                                        <a href="/course/edit/<?= $course['id']; ?>" 
                                                           class="btn btn-outline-primary" 
                                                           title="Modifier">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <button class="btn btn-outline-secondary" 
                                                                disabled 
                                                                title="Course validée">
                                                            <i class="bi bi-lock"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    
                                                    <?php if ($course['etat'] !== 'valide'): ?>
                                                        <form method="GET" action="/course/valide/<?= $course['id']; ?>" class="d-inline" onsubmit="return confirm('Valider cette course ? Elle ne pourra plus être modifiée.')">
                                                            <button type="submit" class="btn btn-outline-success" title="Valider">
                                                                <i class="bi bi-check-circle"></i>
                                                            </button>
                                                        </form>
                                                    <?php else: ?>
                                                        <button class="btn btn-success" 
                                                                disabled 
                                                                title="Déjà validée">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
