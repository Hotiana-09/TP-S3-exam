<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>New Product</h1>
    <?php if(!empty($name)) { ?>
        <h3><?=$name;?></h3>
        <p>Prix:<?=$prix;?> Ar</p>
    <?php } ?>
</body>
</html>