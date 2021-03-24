<?php
/*
 *	Auteur	:	Gomes Darius
 *	Class	:	I.DA-P3D
 *	Date	:	2021/01/28
 *	Desc.	:	page d'édition d'un post
*/
require_once('model\funcDisplay.php');

// récupération des données
$id = $_GET['id'];  
$postActuel = getPostCommeByID($id);
$allmediaFromPost = getAllMediasFormPost($id);
$text = filter_input(INPUT_POST,"commentaire",FILTER_SANITIZE_STRING);

// vérification si il y a bien un fichier
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
    try {
        // si il ni a pas de modification du text le text de l'ancien post reste intacte
        if ($text == "") {
            $text = $postActuel['commentaire'];
        }
        // mets a jour le text
        connect()->beginTransaction();
        updateEvent($id,$text);
        connect()->commit();

        // suprime les images selectioner
        if (isset($_POST['old_medias'])) {
            foreach ($_POST['old_medias'] as $index => $value) {
                connect()->beginTransaction();
                deleteMedia($value);
                connect()->commit();
            }
        }

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
                InsertMedia($typeImg[$i],$newNewNomFichier,date("Y-m-d"), $id);
                connect()->commit();
            }
            else {
                // Sinon le média n'est pas accepter
                echo "le média n'est pas accepté.";
            }
        }

        header('Location: index.php');
        exit;
    } catch (\Throwable $th) {
        connect()->rollBack();
    }
   
}



