<?php
/*
 *	Auteur	:	Gomes Darius
 *	Class	:	I.DA-P3D
 *	Date	:	2021/01/28
 *	Desc.	:	page de traitement de l'upload de media
*/

$id = $_GET['id'];


if (!isset($id)) {
    include 'includes\traitementFile.php';
}
else {
    include 'includes\Edit.php';
}

