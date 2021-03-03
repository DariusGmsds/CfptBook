<?php
include 'db\func.php';
$btn = filter_input(INPUT_POST, 'btnPost');
if (isset($_FILES["fileImg"])) {
    $typeImg = $_FILES["fileImg"]["type"];
    $nb_files = count($_FILES['fileImg']['name']);
}
$MAX_FILE_SIZE = 3145728;    // 3MB in bytes
$MAX_POST_SIZE = 73400320;  // 70MB in bytes
$error = "";
$errorimg = "";
$size_total = 0;

//define('ACCEPTED_TYPES', ["image/png", "image/jpg", "image/jpeg", "video/mp4", "video/webm", "video/ogg", "audio/mp3", "audio/mpeg", "audio/wav"]);
 
$message = ''; 
if (isset($_POST['btnPost']) && $_POST['btnPost'] == 'SendPost')
{ 
    foreach ($_FILES['fileImg']['size'] as $key => $value) {
        if ($value > $MAX_FILE_SIZE) {
            $error = 'File too heavy.';
            connect()->rollback();
        } else {
            $size_total += $value;
        }
    }

    $text = filter_input(INPUT_POST,"commentaire",FILTER_SANITIZE_STRING);
   
    if(isset($_FILES) && is_array($_FILES) && count($_FILES)>0) {
        for ($i = 0; $i < $nb_files; $i++) {
            $errorimg = $_FILES['fileImg']["error"][$i];
            $fileType = $_FILES['fileImg']['type'][$i];       
            if ($error == 'File too heavy.' || $size_total > $MAX_POST_SIZE) {
                $error = "Fichier trop volumineux!";
                connect()->rollback();
            }
            else{
                try{
                    // Raccourci d'écriture pour le tableau reçu
                    connect()->beginTransaction();
                    $last = InsertPost($text,date('Y-m-d'));
                    connect()->commit();

                    $fichiers = $_FILES['fileImg'];
                    // Boucle itérant sur chacun des fichiers
                    for($i=0;$i<count($fichiers['name']);$i++){
                        // Action pour avoir un nom unique et ecité les personnes qui upload plusieur fois le meme nom de fichier
                        $nom_fichier = $fichiers['name'][$i];
                       // if (in_array($fileType, ACCEPTED_TYPES)) {
                        if (substr($nom_fichier, -3) == "png" || substr($nom_fichier, -3) == "jpg" || substr($nom_fichier, -3) == "PNG" || substr($nom_fichier, -3) == "JPG" || substr($nom_fichier, -3) == "peg" 
                        || substr($nom_fichier, -3) == "PEG" || substr($nom_fichier, -3) == "mp4" || substr($nom_fichier, -3) == "MP4" || substr($nom_fichier, -3) == "mp3" || substr($nom_fichier, -3) == "MP3" 
                        || substr($nom_fichier, -3) == "waw" ||  substr($nom_fichier, -3) == "WAW" || substr($nom_fichier, -3) == "ogg"|| substr($nom_fichier, -3) == "OGG"||  substr($nom_fichier, -3) == "webm" 
                        || substr($nom_fichier, -3) == "WEBM" && $taille > $taille_maxi) {  
                            $nomFichierExplode = explode(".", $nom_fichier);
                            $newNomFichier = md5(time() . $nom_fichier);
                            $newNewNomFichier = $newNomFichier . '.' . strtolower(end($nomFichierExplode));
                            
                            // Déplacement depuis le répertoire temporaire 
                            move_uploaded_file($fichiers['tmp_name'][$i],'uploaded_files/'.$newNewNomFichier);
                            connect()->beginTransaction();       
                            InsertMedia($typeImg[$i],$newNewNomFichier,date("Y-m-d"), $last);
                            connect()->commit();
                        }
                        else {
                            // Sinon le média n'est pas accepter
                            echo "le média n'est pas accepté.";
                        }
                    }
                }catch(Exception $e)
                {
                    connect()-> rollBack();
                }  
            }
        } 
    }  
    header('Location: index.php');
    exit;
}
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
<?php include 'includes\nav.php'; ?>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark" style="text-align: left;width: 100%;height: 100%;">
            <div class="container">
                <div class="block-heading"></div>
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="form-group"><label>Message</label><textarea class="form-control" name="commentaire"></textarea></div>
                    <div class="form-group"> <input type="file" name="fileImg[]" accept=".jpg, .jpeg, .png, .mp4, .mp3, .wav, .gif .mp4 .webm .ogg" multiple /></div> 
                   
                    
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