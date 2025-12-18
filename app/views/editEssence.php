<main>
        <div class="container py-4">
            <form method="POST" action="/insertEssence">
                <!-- En-tête -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">
                        <i class="bi bi-fuel-pump-fill text-warning"></i> 
                        Gestion du Prix de l'Essence
                    </h2>
                    <div class="btn-group">
                        <a href="/" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>

                <!-- Alert info -->
                <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                    <div>
                        <strong>Mise à jour du prix :</strong> Le nouveau prix sera appliqué à toutes les prochaines courses enregistrées.
                    </div>
                </div>

                <!-- Carte Nouveau prix -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-plus-circle-fill"></i> Nouveau prix de l'essence
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">

                            <!-- Prix -->
                            <div class="col-md-6">
                                <label for="prix" class="form-label fw-bold">
                                    <i class="bi bi-currency-exchange"></i> Prix par litre (Ar) <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg">
                                    <input type="number" 
                                           class="form-control" 
                                           id="prix" 
                                           name="prix"
                                           placeholder="Ex: 5000"
                                           step="0.01"
                                           min="0"
                                           required>
                                    <span class="input-group-text bg-success text-white">
                                        <i class="bi bi-cash"></i> Ar/L
                                    </span>
                                </div>
                                <small class="text-muted mt-2 d-block">
                                    <i class="bi bi-calculator"></i> Entrez le prix au litre en Ariary
                                </small>
                            </div>
                        </div>                        
                    </div>
                </div>

                <!-- Actions finales -->
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">
                                    <i class="bi bi-check-circle-fill text-success"></i> Confirmer la mise à jour ?
                                </h5>
                                <small class="text-muted">
                                    Le nouveau prix sera enregistré et utilisé pour les prochains calculs
                                </small>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="/" class="btn btn-secondary btn-lg">
                                    <i class="bi bi-x-circle"></i> Annuler
                                </a>
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-save-fill"></i> Enregistrer le nouveau prix
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>