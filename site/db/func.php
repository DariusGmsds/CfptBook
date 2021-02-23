<?php

include 'db\connect.php';

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

function InsertPost($commentaire,$creationDate){
    $sql = "INSERT INTO `post`(`commentaire`,`creationDate`,`modificationDate`)
    VALUES (:commentaire, :creationDate	, :modificationDate)";

    $query = connect()->prepare($sql);

    $query->execute([
        ':commentaire' => $commentaire,
        ':creationDate' => $creationDate,
        ':modificationDate' => $creationDate,
    ]);

    $latest_id = connect()->lastInsertId();
    return $latest_id;
}
