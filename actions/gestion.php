<?php

    if(isset($_GET['produits']))    {  include('../views/produit.php');}   

    elseif(isset($_GET['login'])){ include('../views/login.php');}

    elseif(isset($_GET['add'])){ include('../views/add.php');}

    elseif(isset($_GET['edit'])){ include('../views/edit.php');}

    elseif(isset($_GET['details'])){ include('../views/details.php');}

    elseif(isset($_GET['ajouter'])){ include('../actions/ajouter.php');}

    elseif(isset($_GET['delete'])){ include('../actions/delete.php');}
    
    elseif(isset($_GET['actualiser'])){ include('../actions/actualiser.php');}

    elseif(isset($_GET['inscription'])){ include('../authentification/inscription.php');}
    
    elseif(isset($_GET['inscription_traitement'])){ include('../authentification/inscription_traitement.php');}

    elseif(isset($_GET['connect']))     { include('../bdd/connect.php');}

    else{ include('../views/login.php');}
   