<!DOCTYPE html> <!-- correspond à la base de toute page vue pour éviter de répéter la structure -->
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titre ?></title>
        <link href="vues/style.css" rel="stylesheet" />
    </head>

    <body>
      <?= $content ?>
    </body>
</html>
