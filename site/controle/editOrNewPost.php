<?php
/*
 *	Auteur	:	Gomes Darius
 *	Class	:	I.DA-P3D
 *	Date	:	2021/01/28
 *	Desc.	:	page qui regarde si la page poste doit editer un post ou ajouter un nouveaux poste
*/

// récupère l'id du post
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ajaxFunction = "editPost(" . $id . ")";
}else{ 
    $id = null;
    $ajaxFunction = "createPost()";
}