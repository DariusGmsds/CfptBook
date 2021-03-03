<?php
include 'db\func.php';

$btnDelete = filter_input(INPUT_POST, 'btnDelete');
$btnEdite = filter_input(INPUT_POST, 'btnEdite');
$txt = "";

$posts = getAllPostsOrderByDateDesc();

//echo("boutton pressed");

if ($btnDelete == 'deletePost') {
  $txt = "boutton delete pressed";
  echo($txt);
    //DeleteById_post($id);
}

if ($btnEdite == 'editPost') {
   $txt = "boutton edite pressed";
   echo($txt);
    //DeleteById_post($id);
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blog - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <?php include 'includes\nav.php'; ?>
    <main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Welcome</h2>
                    <p>Bienvenue sur cfptBook la messagerie technique</p>
                </div>
                <?php
                foreach ($posts as $index => $post) {
                ?>
                    <div class="container p-2">
                        <div class="card">
                            <form method="POST" action="#">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                        <th scope="col"> <button class="btn btn-danger mb-2" type="submit" name="btnDelete" value="deletePost"> Supprimer </button></th>
                                        <th scope="col"> <button class="btn btn-info" type="submit" name="btnEdite" value="editPost"> Editer </button></th>
                                        </tr>
                                    </thead>
                                </table>
                            </form>
                            <?= displayMedias($post['idPost']) ?>
                            <div class="card-body">
                                <p class="card-text"><?= $post['commentaire'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php 
                }
                ?>
            </div>
        </section>
    

    </main>
    <?php include 'includes\footer.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>