
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- En-tête -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0">
                            <i class="bi bi-shield-lock-fill text-danger"></i> 
                            Code de Sécurité
                        </h2>
                        <a href="/" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Retour
                        </a>
                    </div>

                    <!-- Formulaire -->
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">
                                <i class="bi bi-key-fill"></i> Définir le code
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="/vider/confirme">
                                <!-- Code -->
                                <div class="mb-4">
                                    <label for="code_securite" class="form-label fw-bold">
                                        Code de sécurité <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" 
                                           class="form-control form-control-lg shadow-sm" 
                                           id="code_securite" 
                                           name="code_securite"
                                           placeholder="Entrez le code"
                                           required
                                           autocomplete="off">
                                </div>

                                <!-- Actions -->
                                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                    <a href="/" class="btn btn-outline-secondary btn-lg">
                                        <i class="bi bi-x-circle"></i> Annuler
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-lg shadow-sm">
                                        <i class="bi bi-save-fill"></i> Confirmer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
