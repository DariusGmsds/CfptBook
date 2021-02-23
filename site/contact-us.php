<?php
include 'db\func.php';
session_start();
$btn = filter_input(INPUT_POST, 'btnPost');
$comme = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
// $date = date('Y-m-d'); 
// $date2 = date("Y-m-d H:i:s");  
// $nameImg = $_FILES["fileImg"]["name"];
// $sizeImg = $_FILES["fileImg"]["size"];
// $typeImg = $_FILES["fileImg"]["type"];
// $tmp_nameImg = $_FILES['fileImg']['tmp_name'];


 
$message = ''; 
if (isset($_POST['btnPost']) && $_POST['btnPost'] == 'SendPost')
{
    $text = filter_input(INPUT_POST,"commentaire",FILTER_SANITIZE_STRING);
    $last = InsertPost($text,date('Y-m-d'));
    if(isset($_FILES) && is_array($_FILES) && count($_FILES)>0) {
        // Raccourci d'écriture pour le tableau reçu
        $fichiers = $_FILES['fileImg'];
        // Boucle itérant sur chacun des fichiers
        for($i=0;$i<count($fichiers['name']);$i++){

        // Action pour avoir un nom unique et ecité les personnes qui upload plusieur fois le meme nom de fichier
        $nom_fichier = $fichiers['name'][$i];
        $nomFichierExplode = explode(".", $nom_fichier);
        $newNomFichier = md5(time() . $nom_fichier);
        $newNewNomFichier = $newNomFichier . '.' . strtolower(end($nomFichierExplode));
        

        // Déplacement depuis le répertoire temporaire
        move_uploaded_file($fichiers['tmp_name'][$i],'uploaded_files/'.$newNewNomFichier);
        InsertMedia($_FILES["fileImg"]["type"],$newNomFichier,date("Y-m-d"), $last);
        }
    }

   
}
$_SESSION['message'] = $message;



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><img class="rounded-circle bg-white border rounded-pill border-dark shadow" data-bs-hover-animate="pulse" src="assets/img/tech/livre.jpg" width="30%" style="margin-right: 10px;"><a class="navbar-brand logo" href="#">CFPTBook</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Post</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact-us.php">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark" style="text-align: left;width: 100%;height: 100%;">
            <div class="container">
                <div class="block-heading"></div>
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="form-group"><label>Message</label><textarea class="form-control" name="commentaire"></textarea></div>
                    <div class="form-group"><input type="file" accept="image/png, image/jpeg" multiple="" name="fileImg[]"></div> 
                    
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="btnPost" value="SendPost" >Send</button></div>
                </form>
            </div>
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>