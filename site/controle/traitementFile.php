<?php
/*
 *	Auteur	:	Gomes Darius
 *	Class	:	I.DA-P3D
 *	Date	:	2021/01/28
 *	Desc.	:	page de traitement de l'upload de nouveaux post avec ou sans media
*/
require_once( 'model\funcDisplay.php');

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
                        || substr($nom_fichier, -3) == "waw" ||  substr($nom_fichier, -3) == "WAW" || substr($nom_fichier, -3) == "ogg"|| substr($nom_fichier, -3) == "OGG"||  substr($nom_fichier, -4) == "webm" 
                        || substr($nom_fichier, -4) == "WEBM" && $taille > $taille_maxi) {  
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
                    unlink('uploaded_files/'.$newNewNomFichier);
                    connect()-> rollBack();
                }  
            }
        } 
    }  
    header('Location: index.php');
    exit;
}