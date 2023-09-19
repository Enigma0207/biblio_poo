<!-- ilyara une classe avc de methode pour les users et nos request -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/biblio_poo/models/database.php";
class User{


    // methode staticpublic static function s'inscrire


    //  la methode d'inscription,sera apler à l'action.php et sur une variable  User::inscription($name,$email,$passwordHash);
    
     static function inscription($name, $email,$password){
        //  connection à la bdd ::pck c'est une class qui encapsul la bdd
       $db= Database::dbConnect();
       //  prepare la request
       $request = $db->prepare("INSERT INTO users(name, email, password) VALUES (?,?,?)");
      // execuet  request
      try {
         $request->execute(array($name,$email,$password));
        //  rediriger vers login.php
        header("Location:http://localhost/biblio_poo/views/login");
          } catch (PDOException $e) {
            echo $e->getMessage();
        }
         
     }


    // methode staticpublic static function se connecter

        static function connexion($email,$password){


         //  connection à la bdd ::pck c'est une class qui encapsul la bdd
         $db= Database::dbConnect();
         //  prepare la request
         $request = $db->prepare("SELECT * FROM users WHERE email =?");
              // execuet  request
         try{
           $request->execute(array($email));
          // recupere le resultat de la request dans un tableau
           $user = $request->fetch();
          // verifier si le mot de passe est correct
           if(empty( $user)){
          //   header("Location:http://localhost/biblio_poo/views/login");

          $_SESSION["erreur_message"] = "cet email n'existe pas";
           header("location:". $_SERVER['HTTP_REFERER']);

                
                      
           } else if (password_verify($password, $user['password'])) {
                //  avec le cookies
                // setcookie("id_user", $user["id_user"],time()+86400, "/", "http://localhost/biblio_poo",false, true);
                // setcookie("user_role", $user["roler"],time()+86400, "/", "http://localhost/biblio_poo",false, true);
                $_SESSION["id_user"] = $user["id_user"];
                $_SESSION["user_role"] = $user["role"];
                // quand on se connect , on va aller vers la liste des livre dispo dans la bibliotheque
                header("Location: http://localhost/biblio_poo/views/list_book");

            } else {
                $_SESSION["erreur_message"] = "mot de passe incorrect";
                   //  rediriger vers login.php
                header("Location: http://localhost/biblio_poo/views/login");
           
           }
            

          } catch (PDOException $e) {
                echo $e->getMessage();
         }


        }


         // methode staticpublic static function se deconnecter

          static function logout(){

         }

    // methode staticpublic static function emprunter un livre (borrow) pour avoir lhistorique des emprunt

         public static function borrowLog($idUser){


        //  connection à la bdd ::pck c'est une class qui encapsul la bdd
         $db= Database::dbConnect();
         //  prepare la request pour recupere la liste   des emprund de l'utilisateur emprund
         $request = $db->prepare("SELECT id_borows, user_id, book_id, id_book, titre, start_date, end_date FROM borows, books WHERE borows.book_id = books.id_book AND user_id=?");
              // execuet  request

              try {
         $request->execute(array($idUser));

                //RECUPERE le resultat dans le tableau

           $borrowList = $request->fetchAll();
            return $borrowList;
          } catch (PDOException $e) {
            echo $e->getMessage();
           }

        }


    // methode staticpublic static function suppression de 
        static function delete(){

     }




}
