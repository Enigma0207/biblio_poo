<!-- on va traiter le fichier 1. register -->

<?php
session_start();
// faire apl a notre fichier userModel
require_once "../../models/userModel.php";
require_once "../../models/bookModel.php";


if(isset($_POST['inscription'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // hasher le mot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    // aple a la methode d'inscription du user
    // la methode d'inscription est static donc il faut "::", suivi de nom de la class
    User::inscription($name,$email,$passwordHash);

    
}


// se connecter

if(isset($_POST['login'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    // aple a la methode de connexion du user
    // la methode de connexion ou login est static donc il faut "::", suivi de nom de la class
    User::connexion($email, $password);

    
}


// ajout des livre

if(isset($_POST['add'])){
    $titre = htmlspecialchars($_POST['titre']);
    $author = htmlspecialchars($_POST['author']);
    $publication = htmlspecialchars($_POST['publication']);

    // aple a la methode addBook du user
    // la methode adbook est static donc il faut "::", suivi de nom de la class
    book::addBook($titre,$author,$publication);

    
}

// pour l'emprut (borrow book) d'un livre des utilisateur
// get pck dans la list_book on a donné un paramettre book qui est un lien

if(isset($_GET['book'])){
    // identifiant du livre à emprunter
    $book = $_GET['book'];
    // on reccupere aussi l'identifiant de l'utilisateur qui sest connecté celui emprunte
    $id_user = $_SESSION["id_user"];
    // appel de la methode borrowBook pour emprunter. on le cree dans bookModel

   
    book::borrowBook($id_user,$book);

    
}
// pour rendre un livrer

if(isset($_GET['borrow'])){
    // identifiant de l'mpruent
    $borrow = $_GET['borrow'];
    $bookid = $_GET['bookid'];
    // appel de la methode returnBook pour remette le livre. on le cree dans bookModel

    book::returnBook($borrow, $bookid);

    
}