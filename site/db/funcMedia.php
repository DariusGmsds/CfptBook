<?php
/*
 *	Auteur	:	Gomes Darius
 *	Class	:	I.DA-P3D
 *	Date	:	2021/01/28
 *	Desc.	:	fonction sql des medias
*/



function InsertMedia($typeMedia, $nomMedia, $creationDate,$lastid)
{
    $sql = "INSERT INTO `media`(`typeMedia`,`nomMedia`,`creationDate`,`idPost`)
    VALUES (:typeMedia,:nomMedia ,:creationDate , $lastid)";
    $query = connect()->prepare($sql);
    $query->execute([
        ':typeMedia' => $typeMedia,
        ':nomMedia' => $nomMedia,
        ':creationDate' => $creationDate,
    ]);
}

function del_media($idPost)
{
    $db = connect();
    $sql = "DELETE FROM `media` WHERE `media`.`idPost` = :id";
    $q = $db->prepare($sql);
    $q->execute([
        ':id' => $idPost,
    ]);
}

function getAllMediasFormPost($idPost)
{
    $connexion = connect();
    $query = $connexion->prepare(
        "SELECT `m`.`idMedia`, `m`.`nomMedia`, `m`.`typeMedia`, `m`.`creationDate`, `m`.`modificationDate`
        FROM `media` as m
        WHERE `m`.`idPost` = :idPost");
    $query->bindParam('idPost', $idPost, PDO::PARAM_INT, 11);
    $query->execute();
    $query = $query->fetchAll(PDO::FETCH_ASSOC);

    return $query;
}
