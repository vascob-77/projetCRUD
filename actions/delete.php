<?php

//On démarre la séssion qui vas nous permettre d'utiliser la superglobal Session

session_start();

// verifier l'id envoyer dans l'url si
// il existe affiche la page, sinon
//redirection vers une autre page

//est ce qu'il existe et est ce qu'il est pas vide 
//-> proteger si l'url est pas cohérente
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('?connect');

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
        header('Location: ?produit');
    }

    $sql = 'DELETE FROM `liste` WHERE `id` = :id;';

    // On prépare la rêquete

    $query = $db->prepare($sql);

    //On y ajoute la valeur au Select de dessus, on vérifie que l'id est bien un INT

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //On éxécute la requete

    $query->execute();
    $_SESSION['confirmation'] = "Produit supprimé";
    header('?produit');
} else {
    $_SESSION['erreur'] = "URL invalide";
    header('?produit');
}

?>

