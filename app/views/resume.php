<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résumé financier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2 class="mb-4">Résumé financier des courses</h2>

<!-- TOTAUX -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="alert alert-success">
            <strong>Recettes totales :</strong><br>
            <?= number_format($totaux['recette_totale'], 0, ',', ' ') ?> Ar
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-danger">
            <strong>Dépenses totales :</strong><br>
            <?= number_format($totaux['depense_totale'], 0, ',', ' ') ?> Ar
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-primary">
            <strong>Bénéfice total :</strong><br>
            <?= number_format($totaux['benefice_total'], 0, ',', ' ') ?> Ar
        </div>
    </div>
</div>

<!-- TABLEAU -->
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Date</th>
            <th>Recette</th>
            <th>Dépense</th>
            <th>Bénéfice</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resume as $row): ?>
        <tr>
            <td><?= $row['date'] ?></td>
            <td><?= number_format($row['recette'], 0, ',', ' ') ?> Ar</td>
            <td><?= number_format($row['depense'], 0, ',', ' ') ?> Ar</td>
            <td><?= number_format($row['benefice'], 0, ',', ' ') ?> Ar</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
