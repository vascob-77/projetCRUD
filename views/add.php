
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                 if(!empty($_SESSION['erreur'])){
                     echo '<div class="alert-danger" role="alert">
                            '. $_SESSION['erreur'].' </div';
                            $_SESSION['erreur'] = "";
                 }
                ?>

                <h1>Ajouter un produit</h1>

                <form method="post">

                    <div class="form-group">
                        <label for="produit">Définir le produit</label>
                        <input type="text" id="produit" name="produit" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="prix">Définir le prix</label>
                        <input type="number" id="prix" name="prix" class="form-control">
                    </div>

                    <button class="btn btn-primary">Envoyer</button>

                </form>



            </section>

        </div>
    </main>
