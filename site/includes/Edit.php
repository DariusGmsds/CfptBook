<?php
/*
 *	Auteur	:	Gomes Darius
 *	Class	:	I.DA-P3D
 *	Date	:	2021/01/28
 *	Desc.	:	page de traitement de l'upload de media
*/
include 'db\func.php';
$id = $_GET['id'];  
$postActuel = getPostCommeByID($id);

var_dump($_GET['id']);
var_dump($postActuel);

$text = filter_input(INPUT_POST,"commentaire",FILTER_SANITIZE_STRING);

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
        if ($text == "") {
            $text = $postActuel[0];
        }
        connect()->beginTransaction();
        updateEvent($id,$text);
        connect()->commit();
        header('Location: index.php');
        exit;
    } catch (\Throwable $th) {
        connect()->rollBack();
    }
   
}