<?php

session_start();
// on inclu notre nav dans list_book.php pour recuperer les lien

require_once '../models/bookModel.php';
// onfait appl a notre fonction et ca valeur de retour, mais on met ::avant la class pck cest statick
$listBook = Book:: listBook();
; ?>
<!-- on va ouvrir html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/biblio_poo/views/assets/css/style.css">

</head>
<body>
    <!-- on ajoute la nav pour afficher comme incon -->
    <?php  require_once 'inc/nav.php'; ?>
    <!-- pour chaque livre, ces info seront stocker dans $book, et on recupere le titre,author rt publication -->
    <div class="container">
        <?php foreach ($listBook as $book) { ?>
        <div class="book">
            <h1><?= $book['titre']; ?></h1>
            <h2><?= $book['author']; ?></h2>
            <p><?= $book['publication']; ?></p>
            <!-- si le livre est disp, ce bouton sera aficher pour emprunter le livre -->
            <!-- redirige vert action.php, notre book(id)qui est pris au hasard est egal à id_book qui est stoquer dans $book -->
            <?php if( $book['state'] == "available") { ?>
                <a href="traitement/action.php?book=<?= $book['id_book'];?>">Borrow This book</a>
            <?php } ?>
        </div>

        
        <?php } ?>
    </div>
</body>
</html>