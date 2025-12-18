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
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="display-5 fw-bold mb-2">
                        <i class="bi bi-list-ul"></i> Gestion de Taxi Moto
                    </h1>
                    <p class="mb-0">Gérez toutes vos courses</p>
                </div>
                <div class="btn-group">
                    <a href="/" class="btn btn-light btn-lg">
                        <i class="bi bi-house"></i> Accueil
                    </a>
                    <a href="/liste" class="btn btn-light btn-lg">
                        <i class="bi bi-card-checklist"></i> List
                    </a>
                    <a href="/create" class="btn btn-success btn-lg">
                        <i class="bi bi-plus-circle"></i> Nouvelle Course
                    </a>
                </div>
            </div>
        </div>
    </div>

    <main class="container my-5 flex-grow-1">
        <?php
        if (isset($page)) {
         require __DIR__ . '/' . $page;
        } ?>
    </main>

    <footer>
        <p>&copy; ETU004106 - ETU004132</p>
    </footer>

</body>
</html>