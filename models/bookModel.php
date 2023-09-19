<!-- ici on va crrer une class avec methode list book pour reccuperer les la liste des livre ; add book -->
<?php
// session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/biblio_poo/models/database.php";


// class book pour ajouter le
class Book{
  public static function addBook($titre, $author, $publication){
// se connecter a la bdd
       $db = Database::dbConnect();

    //    prepare la request
    $request = $db->prepare("INSERT INTO books (titre, author, publication) VALUES (?,?,?)");
    try {
          $request->execute(array($titre, $author, $publication));
          header("Location:http://localhost/biblio_poo/views/list_book.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

  }

//   methode pour recuper la liste des livre, on veut afficher la liste des livre

  public static function listBook(){
    //   se connecter
           $db = Database::dbConnect();
          $request = $db->prepare("SELECT * FROM books");
        //   ECXECUTER
          try {
          $request->execute();
          // recuperer les tablresultateau de la request dans un tableau
          $listBook = $request->fetchALL();
        //   return $listBook qui stock les valeur du tableau cad les livre et sera utiliser pour afficher les livres quand on fera apple a la fonction listBook() dans listBook
          return  $listBook ;
        } catch (PDOException $e) {
        echo $e->getMessage();
    }


  }


// methode pour emprunter un livre   avec deux paramettre identifiant de l'utilisater et du livre $user, $book


  public static function borrowBook($user, $book){
    //   se connecter
           $db = Database::dbConnect();
        //    prepare
          $request = $db->prepare("INSERT INTO borows (start_date, user_id, book_id) VALUES (NOW(),?,?)"); //NOW() cad au moment ou l'utilisateur emprunte le livre
        //   ECXECUTER
          try {
            //   
          $request->execute(array($user, $book));
          //request pour mettre le statut du livre en unavailable cad la statut
           $request1 = $db->prepare("UPDATE books SET state=? WHERE id_book = ?");
               try {
                   $request1->execute(array("unavailable", $book));

          header("Location:http://localhost/biblio_poo/views/logs.php");

               } catch (PODException $e) {
                   echo $e->getMessage();
               }
     
        } catch (PDOException $e) {
        echo $e->getMessage();
    }


  }


  // methode pour rendre un livre
    public static function returnBook($borrow, $bookId){
        // se connecter a bd
        $db = Database::dbConnect();
        // preparer la requete
        $request = $db->prepare("UPDATE borows SET end_date = NOW() WHERE id_borows = ?");
        // executer la requete
        try{
            $request->execute(array($borrow));
            // la requete pour metre a jour le livre a available
            $request1 = $db->prepare("UPDATE books SET state = ? WHERE id_book = ?");
            try{
                $request1->execute(array("available", $bookId));
                header("Location: http://localhost/biblio_poo/views/logs");
            }catch(PDOException $e){
                $e->getMessage();
            }
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


// // methode pour RENDRE un livre   avec deux paramettre borrow et lidentifiant du livre 


//   public static function returnBook($borrow, $bookId){
//     //   se connecter
//            $db = Database::dbConnect();
//         //    prepare metytre ajour la date de remise de livre dans la table borros
//           $request = $db->prepare("UPDATE borrows SET end_date = now () WHERE id_borrow = ?"); //NOW() cad au moment ou l'utilisateur emprunte le livre
//         //   ECXECUTER
//           try {
//             //   
//           $request->execute(array($borrow));
//           //metre àjour les livre a availlable, mettre ajour le statut du livre
          
//            $request1 = $db->prepare("UPDATE books SET state=? WHERE id_book = ?");
//                try {
//                    $request1->execute(array("unavailable", $bookId));

//           header("Location:http://localhost/biblio_poo/views/logs.php");

//                } catch (PODException $e) {
//                    echo $e->getMessage();
//                }
     
//         } catch (PDOException $e) {
//         echo $e->getMessage();
//     }


//   }

}