<!-- ici cest pour ce connecter -->
<?php session_start()
; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/biblio_poo/views/assets/css/style.css">
</head>
<body>
    <form action="./traitement/action.php" method="post">
       

        <div>
            <label for="">Email</label>
            <input type="email" name="email">
        </div>

        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <!-- on ajoute ca pour afficher l'erreur si l'adress ou mot de passe est in corect -->
        <?php if(isset($_SESSION['error_message'])){ ?>
           <p style="color: red;"><?= $_SESSION['error_message'];?></p>
        <?php } ?>
        <button type="submit" name="login">Se connecter</button>
    </form>
</body>
</html>


