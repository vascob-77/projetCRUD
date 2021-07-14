<?php

//On démarre la session
session_start();

// On inclue la connexion à la base 

require_once('?connect');

$sql = 'SELECT * FROM `liste`';

// On prépare la requete
$query = $db->prepare($sql);

// On éxécute la requete
$query->execute();

//On stocke le résultat dans un tableau associatif

$result = $query->fetchAll(PDO::FETCH_ASSOC);
// je veux les information que le titre des colonnes



?>




    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                if (!empty($_SESSION['erreur'])) {
                    echo '<div class="alert alert-danger" role="alert">
                             ' . $_SESSION['erreur'] . '
                              </div>';
                    $_SESSION['erreur'] = "";
                }
                ?>
                <?php
                if (!empty($_SESSION['confirmation'])) {
                    echo '<div class="alert alert-success" role="alert">
                             ' . $_SESSION['confirmation'] . '
                              </div>';
                    $_SESSION['confirmation'] = "";
                }
                ?>
                <!-- Création d'un tableu -->
                <table class="table">
                    <h1>Liste des produits</h1>
                    <thead>
                        <th>ID</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </thead>
                    <!-- Balise qui regroupe le tableau -->

                    <tbody>

                        <?php
                        //On boucle sur la variable 
                        foreach ($result as $value) {
                        ?>

                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['produit'] ?></td>
                                <td><?= $value['prix'] ?>€</td>
                                <td><a href="?details&id=<?= $value['id'] ?>">Voir</a></td>
                                <td><a href="?edit&id=<?= $value['id'] ?>">Modifier</a></td>
                                <td><a href="?delete&id=<?= $value['id'] ?>">Supprimer</a></td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>


                </table>
                <!-- Ajoute class bootstrap -->
                <a href="?add" class="btn btn-primary">Ajouter un produit</a>
            </section>

        </div>
    </main>

