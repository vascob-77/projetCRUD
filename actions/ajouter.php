<?php

//On démarre la session
session_start();

               

//information envoyé, je vérifie chacun des champs
//Create 
if ($_POST) {
    if (
        isset($_POST['produit']) && !empty($_POST['produit'])
        && isset($_POST['prix']) && !empty($_POST['prix'])){

        require_once('../php/connect.php');    

        $produit = strip_tags($_POST['produit']);
        $prix = strip_tags($_POST['prix']);
        
        $sql = 'INSERT INTO `liste` (`produit`,`prix`) VALUES (:produit, :prix);';

        $query = $db->prepare ($sql);

        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['confirmation'] = "Produit ajouté";
        require_once('../php/close.php');

        header('Location: ?produit');
        
       

    } else {
        $_SESSION['erreur'] = "Le formulaire est imcomplet";
    }
}


?>