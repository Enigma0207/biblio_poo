<nav>

    <!-- on cree la navigation pour la connection d'admin et de lutilisateur soit pour ajouter des livre,  -->
    <a href="http://localhost/biblio_poo/home">Home</a>
    <!--  -->
    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role']== "admin"){ ?>
        <a href="http://localhost/biblio_poo/add_book">Add Book </a>
        <!-- pour lutilisateur simple -->

    <?php }  else { ?>
        <a href="http://localhost/biblio_poo/logs">Logs</a>
    <?php } ?>
</nav>