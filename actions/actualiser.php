<?php

//On démarre la session
session_start();

//information envoyé, je vérifie chacun des champs
//Create 
if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['produit']) && !empty($_POST['produit'])
        && isset($_POST['prix']) && !empty($_POST['prix'])){

        require_once('../php/connect.php');    

        $id = strip_tags($_POST['id']);
        $produit = strip_tags($_POST['produit']);
        $prix = strip_tags($_POST['prix']);
        
        $sql = 'UPDATE liste SET produit = :produit , prix = :prix WHERE id = :id';

        $query = $db->prepare ($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_INT);

        $query->execute();

        $_SESSION['confirmation'] = "Produit modifié";
        require_once('../php/close.php');

        header('Location: ../views/produit.php');

       

    } else {
        $_SESSION['erreur'] = "Le formulaire est imcomplet";
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('php/connect.php');

    //On n'ettoit l'id envoyé, strip tags enleve toute les balises html  A VERIF
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `liste` WHERE `id` = :id;';

    // On prépare la rêquete

    $query = $db->prepare($sql);

    //On y ajoute la valeur au Select de dessus, on vérifie que l'id est bien un INT

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //On éxécute la requete

    $query->execute();

    //On récupère le produit

    $value = $query->fetch(); // fetch pour un produit

    //On vérifie si le produit existe

    if (!$value) {
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: produit.php');
    }
} else {
    $_SESSION['erreur'] = "URL invalide";
    header('Location: produit.php');
}          
 


?>