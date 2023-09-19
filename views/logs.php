<!-- ici on afficje la liste des emprun des utilisateur avk la methde pour avoir lhistorique desz emprunt -->
<?php
session_start();

require_once "../models/userModel.php";
// paramettre ["id_user"]
$borrowList = User::borrowLog($_SESSION ["id_user"]) ;

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <!-- on affiche la liste des ce que lutilisater a empruntyer dans un tableau -->

<body>
    <table>
        <thead>

        </thead>
        <tr>
            <th>id</th>
            <th>start date</th>
            <th>end date</th>
            <th>titre</th>
            <th>action</th>
        </tr>
        <tbody>
            <?php foreach($borrowList as $borrow){ ?>
                <tr>
                    <td><?= $borrow['id_borows']; ?></td>
                    <td><?= $borrow['start_date']; ?></td>
                    <td><?= $borrow['end_date']; ?></td>
                    <td><?= $borrow['titre']; ?></td>
                    <!-- on va mettre une condition pour le bouton -->
                    <?php if($borrow["end_date"] == null ) { ?>
                        
                        <td><a href="traitement/action.php?borrow=<?=$borrow['id_borows']; ?>&bookid=<?=$borrow["book_id"]; ?>">rendre le livre</a></td>

            <?php }  ?>
                </tr>       
            <?php }  ?>
               
        </tbody>
    </table>
</body>
</html>