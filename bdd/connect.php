<?php 


    try {
        
        //Connexion à la base
        $db = new PDO('mysql:host=localhost;dbname=crud','root', '');

        //Permettre tous les échanges en base de données qui se met en encodage UTF8
        $db->exec('SET NAMES "UTF8');

    } 
    // si marche pas
    catch(PDOException $e){
        echo "Erreur : ".$e->getMessage();
        die();
    }


    ?>