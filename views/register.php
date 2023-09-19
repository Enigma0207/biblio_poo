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
            <label for="">Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label for="">Email</label>
            <input type="email" name="email">
        </div>

        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit" name="inscription">S'incrire</button>
    </form>
</body>
</html>


