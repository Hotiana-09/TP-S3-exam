<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - E-commerce</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="index.html" class="logo">E-Varotra</a>
                <ul class="menu">
                    <li><a href="index.html">Accueil</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <h1>Bienvenue sur notre boutique</h1>
        <section class="product-list">
            <?php foreach($list_products as $prod){?>
            
                <article class="product-card">
                <a href="/produit/<?= $prod['id']; ?>">
                    <img src="/assets/images/<?= $prod['image']; ?>" alt="Produit 1">
                    <h2><?= $prod['name']; ?></h2>
                    <p>Prix : <?= $prod['prix']; ?> Ar</p>
                </a>
            </article>
            <?php } ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 E-Varotra</p>
    </footer>
</body>
</html>