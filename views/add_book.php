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
            <label for="">Title</label>
            <input type="text" name="titre">
        </div>

        <div>
            <label for="">Athor</label>
            <input type="text" name="author">
        </div>

        <div>
            <label for="">Publication</label>
            <input type="date" name="publication">
        </div>
        <button type="submit" name="add">AddBooks</button>
    </form>
</body>
</html>


