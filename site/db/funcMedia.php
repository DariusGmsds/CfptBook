<?php


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


function del_media($idMedia)
{
    try {
        $sql = "DELETE FROM `media` WHERE `id` = ':id';";
        $data = array(':id' => $idMedia);
        $db =  connect()->getConnection();
        $db->beginTransaction();
        $query = $db->prepare($sql);
        $query->execute($data);
        $db->commit();
        return $query->fetchAll();
    } catch (\Throwable $th) {
        $th->getMessage();
        $db->rollBack();
        return FALSE;
    }
}

