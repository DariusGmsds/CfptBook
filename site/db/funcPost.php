<?php

function updateById_post($id, $comment)
{
    try {
        $date = date(">-m-d H:i:s");
        $sql = "UPDATE `post` SET `commentaire`=:comment, `dateModification`=:date WHERE `idPost` = :id";
        $db = connect()->getConnection();
        $query = $db->prepare($sql);
        $data = array(":id" => $id, ":date" => $date, ":comment" => $comment);
        $query->execute($data);
    } catch (\Throwable $th) {
        $th->getMessage();
        return FALSE;
    }
    return TRUE;
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


function deletePost($id){
    $sql = "DELETE FROM `post` WHERE `idPost` = :id";

    $query = connect()->prepare($sql);

    $query->execute([
        ':id' => $$id,
    ]);

    $latest_id = connect()->lastInsertId();
    return $latest_id;
}

function DeleteById_post($id)
{
    try {
        $sql = "DELETE FROM `post` WHERE `idPost` = :id";
        $db = connect()->getConnection();
        $data = array(":id" => $id);
        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (\Throwable $th) {
        $th->getMessage();
        return FALSE;
    }
    return TRUE;
}

function getNumberOfMediaForPost($idPost)
{
    $connexion = connect();
    $query = $connexion->prepare(
        "SELECT count(*) as 'count'
        FROM `media` as m
        WHERE `m`.`idPost` = :idPost");
    $query->bindParam('idPost', $idPost, PDO::PARAM_INT, 11);
    $query->execute();
    $query = $query->fetchAll(PDO::FETCH_ASSOC);
    $query = $query[0]['count'];

    return $query;
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

function getAllPostsOrderByDateDesc()
{
    $connexion = connect();
    $query = $connexion->prepare(
        "SELECT `idPost`, `commentaire`, `creationDate`, `modificationDate`
        FROM `post`
        ORDER BY `post`.`creationDate` DESC");
    $query->execute();
    $query = $query->fetchAll(PDO::FETCH_ASSOC);
    return $query;
}
